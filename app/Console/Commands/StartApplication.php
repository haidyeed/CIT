<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class StartApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            exec('cp .env.example .env');

            //TODO:
            // call 'composer install' command programmatically

            Artisan::call('key:generate');

            DB::Connection('mysql')->statement('CREATE DATABASE CIT');

            Artisan::call('migrate');

            Artisan::call('schedule:work'); //to run cron job for updating statistics table

            return Command::SUCCESS;

        } catch (\Exception $e) {
            Log::channel('commands')->info("command failed, " . $e->getMessage());
        }

    }

}
