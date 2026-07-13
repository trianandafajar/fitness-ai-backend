<?php

namespace App\Events;

use App\Models\WeightLog;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeightLogged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public WeightLog $weightLog,
    ) {}
}
