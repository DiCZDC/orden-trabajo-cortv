<?php

namespace App\Providers;

use Native\Desktop\Facades\Window;
use Native\Desktop\Contracts\ProvidesPhpIni;
use Native\Desktop\Facades\Menu;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        // Inicializar la base de datos si no existe
        $this->initializeDatabase();
        
        Menu::create(); 
        Window::open()
            ->title('Ordenes de Trabajo');
    }

    /**
     * Inicializa la base de datos si no existe
     */
    protected function initializeDatabase(): void
    {
        // Determinar la ruta de la base de datos según el entorno
        // En producción/NativePHP usa nativephp.sqlite
        $databasePath = database_path('nativephp.sqlite');
        $needsMigration = false;

        // Si la base de datos no existe, crearla
        if (!File::exists($databasePath)) {
            File::put($databasePath, '');
            $needsMigration = true;
        }

        // Verificar si las tablas existen
        try {
            // Intentar verificar si existe la tabla 'users'
            if (!Schema::hasTable('users')) {
                $needsMigration = true;
            }
        } catch (\Exception $e) {
            $needsMigration = true;
        }

        // Si necesita migración, ejecutar migraciones y seeders
        if ($needsMigration) {
            try {
                // Ejecutar migraciones
                Artisan::call('migrate', [
                    '--force' => true,
                    '--no-interaction' => true,
                ]);

                // Ejecutar seeders
                Artisan::call('db:seed', [
                    '--force' => true,
                    '--no-interaction' => true,
                ]);
            } catch (\Exception $e) {
                // Log del error si falla
                \Log::error('Error al inicializar la base de datos: ' . $e->getMessage());
            }
        }
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
