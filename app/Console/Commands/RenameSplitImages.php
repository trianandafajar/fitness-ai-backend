<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('images:rename-splits
                            {folder : Folder relatif dari public, contoh: execises/roman-chair}
                            {--prefix=Pisahan : Awalan nama file}
                            {--dry-run : Hanya tampilkan perubahan tanpa rename}')]
#[Description('Rename hasil split gambar Canva menjadi nomor berurutan')]
class RenameSplitImages extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $folder = trim(
            str_replace('\\', '/', $this->argument('folder')),
            '/'
        );

        $prefix = trim($this->option('prefix'));
        $dryRun = (bool) $this->option('dry-run');

        $sourceDir = public_path($folder);

        if (!is_dir($sourceDir)) {
            $this->error("Folder tidak ditemukan: {$sourceDir}");

            return self::FAILURE;
        }

        $files = glob($sourceDir . '/*.png');

        if (empty($files)) {
            $this->warn('Tidak ada file PNG.');

            return self::SUCCESS;
        }

        $escapedPrefix = preg_quote($prefix, '/');
        $parsedFiles = [];

        foreach ($files as $file) {
            $filename = basename($file);

            /*
         * Format yang didukung:
         *
         * Pisahan 1.png
         * Pisahan 2.png
         * Pisahan 1 (2).png
         * Pisahan 2 (2).png
         * Pisahan 1 (3).png
         */
            if (!preg_match(
                "/^{$escapedPrefix}\s+(\d+)(?:\s+\((\d+)\))?\.png$/i",
                $filename,
                $matches
            )) {
                $this->line("Dilewati: {$filename}");

                continue;
            }

            $parsedFiles[] = [
                'path' => $file,
                'filename' => $filename,
                'number' => (int) $matches[1],
                'batch' => isset($matches[2])
                    ? (int) $matches[2]
                    : 1,
            ];
        }

        if (empty($parsedFiles)) {
            $this->warn(
                "Tidak ada file yang cocok dengan format '{$prefix} 1.png'."
            );

            return self::SUCCESS;
        }

        /*
     * Urut berdasarkan batch, kemudian nomor.
     *
     * Batch 1:
     * Pisahan 1.png
     * Pisahan 2.png
     *
     * Batch 2:
     * Pisahan 1 (2).png
     * Pisahan 2 (2).png
     */
        usort($parsedFiles, function (array $a, array $b): int {
            return [$a['batch'], $a['number']]
                <=> [$b['batch'], $b['number']];
        });

        $temporaryFiles = [];

        /*
     * Rename semua file ke nama sementara terlebih dahulu
     * agar tidak bentrok dengan file tujuan seperti 1.png.
     */
        foreach ($parsedFiles as $index => $data) {
            $newNumber = $index + 1;

            $finalFilename = "{$newNumber}.png";
            $temporaryFilename = "__rename_temp_{$newNumber}.png";

            $temporaryPath = $sourceDir
                . DIRECTORY_SEPARATOR
                . $temporaryFilename;

            $finalPath = $sourceDir
                . DIRECTORY_SEPARATOR
                . $finalFilename;

            $this->line(
                "{$data['filename']} → {$finalFilename}"
            );

            if ($dryRun) {
                continue;
            }

            if (file_exists($temporaryPath)) {
                $this->error(
                    "File sementara sudah ada: {$temporaryFilename}"
                );

                return self::FAILURE;
            }

            if (!rename($data['path'], $temporaryPath)) {
                $this->error(
                    "Gagal rename sementara: {$data['filename']}"
                );

                return self::FAILURE;
            }

            $temporaryFiles[] = [
                'temporary' => $temporaryPath,
                'final' => $finalPath,
            ];
        }

        if ($dryRun) {
            $this->warn(
                'Dry-run selesai. Tidak ada file yang diubah.'
            );

            return self::SUCCESS;
        }

        /*
        * Setelah semua file aman di nama sementara,
        * rename menjadi 1.png, 2.png, 3.png, dan seterusnya.
        */
        foreach ($temporaryFiles as $data) {
            if (file_exists($data['final'])) {
                $this->error(
                    'File tujuan sudah ada: '
                        . basename($data['final'])
                );

                return self::FAILURE;
            }

            if (!rename($data['temporary'], $data['final'])) {
                $this->error(
                    'Gagal membuat: '
                        . basename($data['final'])
                );

                return self::FAILURE;
            }
        }

        $this->newLine();

        $this->info(
            'Berhasil rename '
                . count($temporaryFiles)
                . ' file.'
        );

        return self::SUCCESS;
    }
}
