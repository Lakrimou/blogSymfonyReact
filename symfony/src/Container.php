<?php

namespace App;

class Container 
{
    private $services = [];
    private $aliases = [];

    public function addServices($name, \Closure $closure, ?string $alias = null): void
    {
        $this->services[$name] = $closure;

        if($alias) {
            $this->addAlias($alias, $name);
        }
    }

    public function addAlias(string $alias, string $service): void
    {
        $this->aliases[$alias] = $service;
    }

    public function hasService($name): bool
    {
        return isset($this->services[$name]);
    }

    public function hasAlias(string $name): bool
    {
        return isset($this->aliases[$name]);
    }

    public function getAlias(string $name)
    {
        // var_dump($name);
        // var_dump('llllllllllll');
        // var_dump($this->aliases[$name]);
        // var_dump($this->getService($this->aliases[$name]));
        return $this->getService($this->aliases[$name]);
    }

    public function getService(string $name)
    {
        if (!$this->hasService($name)) {
            return null;
        }
        
        if($this->services[$name] instanceof \Closure)
        {
             $this->services[$name] = $this->services[$name]();
        }
        
        return $this->services[$name];
    }

    public function getServices(): array
    {
        return [
            'services' => array_keys($this->services),
            'aliases' => $this->aliases
        ];
    }

    public function loadServices(string $namespace, ?\Closure $callback = null): void
    {
        $baseDir = __DIR__.'/'; // /var/www/html/training/symfony/src/
        $actualDirectory = str_replace('\\', '/', $namespace); 
        //var_dump($namespace); // App\Service
        //var_dump($actualDirectory); // App/Service
        echo '<br>';
        $actualDirectory = $baseDir.substr(
            $actualDirectory, strpos($actualDirectory, '/') + 1
        );
        //var_dump($actualDirectory); // /var/www/html/training/symfony/src/Service
        
        // scandir => array[0 =>'.', 1 =>'..', 2 =>'Serializer.php']
        // array_filter(array, anonymeFunction()) => array[2 =>'Serializer.php']

        $files = array_filter(scandir($actualDirectory), function($file) {
            return $file !== '.' && $file !== '..';
        });

        foreach($files as $file)
        {
            $class = new \ReflectionClass($namespace.'\\'.basename($file, '.php'));
            $serviceName = $class->getName();
            $constructor = $class->getConstructor();
            $arguments = $constructor->getParameters();
            //parameters to inject into service constructor
            $serviceParameters = [];

            foreach($arguments as $argument)
            {
                $type = (string)$argument->getType();
                // var_dump('101  '.$type);
                // echo '<br>';
                //var_dump($this->getAlias($type));
                
                if ($this->hasService($type) || $this->hasAlias($type)){
                    $serviceParameters[] = $this->getService($type) 
                    ?? $this->getAlias($type);
                } else { //try to fetch the service later if the service is not found cause it maybe not loaded
                    $serviceParameters[] = function() use ($type) {
                        return $this->getService($type)
                        ?? $this->getAlias($type);
                    };
                }
            }
            // echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';
            // var_dump('**************');
            // echo '<br>';
            // var_dump($serviceParameters);
            // echo '<br>';
            // var_dump('**************');
            // echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';
            
            $this->addServices($serviceName, function() use($serviceName, $serviceParameters){
                foreach($serviceParameters as &$serviceParameter) {
                    if ($serviceParameter instanceof \Closure) {
                        $serviceParameter = $serviceParameter();
                    }
                    return new $serviceName(...$serviceParameters);
                }
            });
            if($callback) {
                $callback($serviceName, $class);
            }
        }
    }
}