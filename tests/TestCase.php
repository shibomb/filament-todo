<?php

namespace Shibomb\FilamentTodo\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Shibomb\FilamentTodo\Tests\Models\User;
use Shibomb\FilamentTodo\TodoServiceProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Shibomb\\FilamentTodo\\Tests\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            LivewireServiceProvider::class,
            TablesServiceProvider::class,
            TodoServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('auth.providers.users.model', User::class);
        config()->set('database.default', 'testing');
        config()->set('app.key', 'base64:EWcFBKBT8lKlGK8nQhTHY+wg19QlfmbhtO9Qnn3NfcA=');
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
