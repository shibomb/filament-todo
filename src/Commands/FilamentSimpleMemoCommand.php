<?php

namespace Shibomb\FilamentSimpleMemo\Commands;

use Illuminate\Console\Command;

class FilamentSimpleMemoCommand extends Command
{
    public $signature = 'filament-simple-memo';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
