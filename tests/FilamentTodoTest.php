<?php

it('can install todo migrations and configurations', function () {
    $this->artisan('filament-todo:install')
        ->expectsOutput('Publishing Todo Configuration...')
        ->expectsOutput('Publishing Filament Todo Migrations...')
        ->expectsOutput('Filament todo was installed successfully.')
        ->assertExitCode(0);
});
