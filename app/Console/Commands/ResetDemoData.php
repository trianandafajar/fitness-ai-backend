<?php

namespace App\Console\Commands;

use Database\Seeders\DemoUserSeeder;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('demo:reset')]
#[Description('Reset the demo user and recreate a clean, populated demo account')]
class ResetDemoData extends Command
{
    public function handle(DemoUserSeeder $seeder): void
    {
        $seeder->run();
    }
}
