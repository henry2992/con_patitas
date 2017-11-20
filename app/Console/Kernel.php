<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Artisan;
use App\User;
use Symfony\Component\Console\Helper\ProgressBar;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');

// sample for artisan command->describe('Build the project');
        Artisan::command('build {project}', function ($project) {

                 $name = $this->ask('What is your name?');
                 $password = $this->secret('What is the password?');
                 if ($this->confirm('Do you wish to continue?')) {
                    $this->info('Thank  you . You have input OKAY.');
                 }
                 $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
                 $name = $this->choice('What is your name?', ['Taylor', 'Dayle'], 1);
                 $this->error('Something went wrong!');

                 $users = User::all();

                $bar = $this->output->createProgressBar(10000);
                $bar->setFormat('Progress: %percent%%');
                for ($i=0;$i<10000;$i++) {
                  //  $this->performTask($user);
                     $bar->setMessage('Importing invoices...');
                     $bar->advance();
                }

                $bar->finish();
                $this->info("Building {$project}!");
        })->describe('Build the project');;
    }
}
