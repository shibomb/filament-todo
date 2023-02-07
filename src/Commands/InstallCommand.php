<?php

namespace Shibomb\FilamentTodo\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filament-todo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the todo resources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Publishing Todo Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'filament-todo-config']);

        $this->comment('Publishing Filament Todo Migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'filament-todo-migrations']);

        $this->info('Filament todo was installed successfully.');

        return 0;
    }
}
