<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Livewire\Features\SupportAutoInjectedAssets\SupportAutoInjectedAssets;

use App\Models\{
Trabajador,
User,
Empleado,
Productor
};
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        SupportAutoInjectedAssets::$forceAssetInjection = true;

        // Solo ejecutar seeding en entorno NativePHP (cuando NATIVEPHP_RUNNING está presente)
        if (env('NATIVEPHP_RUNNING')) {
            $this->seedDatabaseIfNeeded();
        }
    }

    protected function seedDatabaseIfNeeded(): void
    {
        try {
            // Verificar si las tablas principales existen
            if (!Schema::hasTable('users') || !Schema::hasTable('trabajadors')) {
                return; // Las migraciones aún no se han ejecutado
            }

            // Verificar si ya existen datos (indica que ya se hizo seed)
            if (User::count() === 0 && Trabajador::count() === 0) {
                // Base de datos vacía, ejecutar seeder
                Artisan::call('db:seed', ['--force' => true]);
                Log::info('Database seeded successfully on first run.');
            }
        } catch (\Exception $e) {
            // Log del error pero no detener la aplicación
            Log::error('Error during database seeding: ' . $e->getMessage());
        }
    }
}
