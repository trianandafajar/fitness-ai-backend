<?php

namespace App\Events;

use App\Models\MealLog;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MealLogged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public MealLog $mealLog,
    ) {}
}
