<?php

namespace Alvarofpp\ReactComponent\Commands;

use Illuminate\Console\Command;
use Alvarofpp\ReactComponent\Exceptions\ComponentAlreadyExists;

class MakeComponentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:react-component
    { name=Example : The name of the component }
    { --require : Add require in app.js }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new React component file.';

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
     * @return bool
     * @throws ComponentAlreadyExists
     */
    public function handle()
    {
        $name = $this->argument('name');
        $name = str_replace('\\', '/', $name);

        $path = $this->createPath($name);
        $filename = ucfirst(class_basename($name));
        $filename = $path . '/' . $filename . '.js';
        $this->createFile($filename, strtolower(class_basename($name)));

        $this->info('Component ' . ucfirst(class_basename($name)) . ' succesfully created!');

        if ($this->option('require')) {
            $this->addRequire($name);
        }

        return true;
    }

    /**
     * Add the component in "app.js".
     * @param string $name
     */
    protected function addRequire(string $name): void
    {
        $appFile = resource_path('js') . '/app.js';
        $requireLine = PHP_EOL."require('./components/".$name."');";

        file_put_contents($appFile, $requireLine, FILE_APPEND);
    }

    /**
     * Creates the React component file.
     *
     * @param string $filename
     * @param string $name
     * @throws ComponentAlreadyExists
     */
    protected function createFile(string $filename, string $name): void
    {
        if (file_exists($filename)) {
            throw ComponentAlreadyExists::fileExists(ucfirst($name));
        }

        $stubFile = $this->getStub();
        $str = file_get_contents($stubFile);
        $replaces = [
            '{{Component}}' => ucfirst($name),
            '{{component}}' => $name,
        ];
        foreach ($replaces as $search => $replace) {
            $str = str_replace($search, $replace, $str);
        }

        file_put_contents($filename, $str);
    }

    /**
     * Creates the directories of the given path.
     *
     * @param string $name Given argument
     * @return string The full path
     */
    protected function createPath(string $name): string
    {
        $dirname = dirname($name);
        $path = resource_path('js');
        $paths = array_merge(['components',], explode('/', $dirname));

        foreach ($paths as $dir) {
            $path .= '/' . $dir;
            if (!file_exists($path)) {
                mkdir($path);
            }
        }

        return $path;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/react-component.stub';
    }
}
