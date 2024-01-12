<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::Connection('mysql')->statement('CREATE DATABASE CIT');
        return Command::SUCCESS;
    }

}
