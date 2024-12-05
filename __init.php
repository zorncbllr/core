<?php

// Add additional directories to be autoloaded.

$directories = [
    // Core files and directories:
    '/',
    '/../models/',
    '/../middlewares/',
    '/utils/',
    '/utils/annotations/'

    // Add custom directories here:

];

spl_autoload_register(
    function ($class)
    use ($directories) {
        foreach ($directories as $dir) {
            $path = __DIR__ . "$dir$class.php";

            if (file_exists($path)) {
                require_once $path;
            }
        }
    }
);

$app = new App();
$database = new Database();
$router = new Router($app);
