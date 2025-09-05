<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class DIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Automatically bind repositories and services
        $this->bindClasses('Repositories', 'Interfaces');
        $this->bindClasses('Services', 'Interfaces');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Any additional bootstrapping tasks can go here
    }

    /**
     * Automatically register all classes in a given folder (e.g. Repositories, Services).
     *
     * @param  string $directory  Directory to bind classes from (e.g. 'Repositories', 'Services')
     * @param  string $interfaceFolder  Interface folder name (e.g. 'Interfaces')
     */
    protected function bindClasses(string $directory, string $interfaceFolder)
    {
        $files = File::allFiles(app_path($directory)); // Scan the specified directory (Repositories or Services)

        foreach ($files as $file) {
            $class = $this->getClassFromFile($file);
            $interface = $this->getInterfaceForClass($class, $interfaceFolder);

            // If the interface exists, bind it to the class
            if ($interface) {
                $this->app->bind($interface, $class);
                Log::info("Bound interface {$interface} to class {$class}");
            }
        }
    }

    /**
     * Get the interface for the given class, if it exists.
     *
     * @param  string $class
     * @param  string $interfaceFolder
     * @return string|null
     */
    protected function getInterfaceForClass(string $class, string $interfaceFolder)
    {
        // For repositories, interfaces are in App\Repositories\Interfaces\
        if (str_contains($class, 'Repositories')) {
            $interface = 'App\\Repositories\\' . $interfaceFolder . '\\' . 'I' . class_basename($class);
        } else {
            // For other classes like Services
            $interface = 'App\\' . $interfaceFolder . '\\' . 'I' . class_basename($class);
        }
        
        return interface_exists($interface) ? $interface : null;
    }

    /**
     * Get the class name from the file path.
     *
     * @param  \Illuminate\Filesystem\Filesystem $file
     * @return string
     */
    protected function getClassFromFile($file): string
    {
        $namespace = 'App';
        $relativePath = Str::replaceFirst(app_path(''), '', $file->getRealPath());
        $className = Str::replace(['/', '.php'], ['\\', ''], ltrim($relativePath, '/'));

        return $namespace . '\\' . $className;
    }
}
