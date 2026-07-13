<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiProviderService
{
    protected string $deepseekKey;
    protected string $deepseekUrl;
    protected string $openaiKey;
    protected string $openaiUrl;

    public function __construct()
    {
        $this->deepseekKey = config('services.deepseek.key');
        $this->deepseekUrl = config('services.deepseek.url');
        $this->openaiKey = config('services.openai.key');
        $this->openaiUrl = config('services.openai.url');
    }

    public function chat(array $messages, array $options = []): array
    {
        try {
            return $this->callDeepseek($messages, $options);
        } catch (\Throwable $e) {
            Log::warning('Deepseek API failed, falling back to OpenAI', [
                'error' => $e->getMessage(),
            ]);

            try {
                return $this->callOpenAI($messages, $options);
            } catch (\Throwable $e2) {
                Log::error('OpenAI fallback also failed', [
                    'error' => $e2->getMessage(),
                ]);

                throw $e2;
            }
        }
    }

    protected function callDeepseek(array $messages, array $options): array
    {
        $response = Http::withToken($this->deepseekKey)
            ->timeout(120)
            ->post("{$this->deepseekUrl}/chat/completions", array_merge([
                'model' => $options['model'] ?? 'deepseek-chat',
                'messages' => $messages,
                'temperature' => $options['temperature'] ?? 0.7,
                'max_tokens' => $options['max_tokens'] ?? 2048,
            ], $options['extra'] ?? []));

        if ($response->failed()) {
            throw new \RuntimeException('Deepseek API error: '.$response->body());
        }

        return $response->json();
    }

    protected function callOpenAI(array $messages, array $options): array
    {
        $response = Http::withToken($this->openaiKey)
            ->timeout(120)
            ->post("{$this->openaiUrl}/chat/completions", array_merge([
                'model' => $options['fallback_model'] ?? 'gpt-4o-mini',
                'messages' => $messages,
                'temperature' => $options['temperature'] ?? 0.7,
                'max_tokens' => $options['max_tokens'] ?? 2048,
            ], $options['extra'] ?? []));

        if ($response->failed()) {
            throw new \RuntimeException('OpenAI API error: '.$response->body());
        }

        return $response->json();
    }

    public function vision(string $prompt, string $imageBase64, array $options = []): array
    {
        $imageDataUri = 'data:image/jpeg;base64,' . $imageBase64;

        $messages = [
            [
                'role' => 'user',
                'content' => [
                    ['type' => 'text', 'text' => $prompt],
                    ['type' => 'image_url', 'image_url' => ['url' => $imageDataUri]],
                ],
            ],
        ];

        try {
            return $this->callOpenAIVision($messages, $options);
        } catch (\Throwable $e) {
            Log::error('OpenAI Vision API failed', [
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    protected function callOpenAIVision(array $messages, array $options): array
    {
        $response = Http::withToken($this->openaiKey)
            ->timeout(120)
            ->post("{$this->openaiUrl}/chat/completions", array_merge([
                'model' => $options['model'] ?? 'gpt-4o-mini',
                'messages' => $messages,
                'max_tokens' => $options['max_tokens'] ?? 1024,
            ], $options['extra'] ?? []));

        if ($response->failed()) {
            throw new \RuntimeException('OpenAI Vision API error: '.$response->body());
        }

        return $response->json();
    }
}
