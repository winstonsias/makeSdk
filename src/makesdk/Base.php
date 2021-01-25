<?php


namespace Winston\MakeSdk\Base;

use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Base
 * @property-read Http $http
 * @package Winston\MaketSdk
 */
class Base extends Container
{

    /**
     * an array of service providers.
     *
     * @var
     */
    protected $providers = [];

    protected $config;

    public function __construct($config)
    {
        parent::__construct();

        $this->setConfig($config);

        if ($this->config['debug'] ?? false) {
            ini_set('display_errors',true);
            error_reporting(E_ALL);
        }

        $this->registerBase();
        $this->registerProviders();
    }

    /**
     * Register basic providers.
     */
    private function registerBase()
    {
        $this['request'] = function () {
            return Request::createFromGlobals();
        };

        $this['http'] = function () {
            return new Http();
        };

    }


    /**
     * Register providers.
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function getConfig($key = null)
    {
        return $key ? ($this->config[$key] ?? null) : $this->config;
    }

    /**
     * Magic get access.
     *
     * @param  string  $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param  string  $id
     * @param  mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    public function rebind(string $id, $value)
    {
        $this->offsetUnset($id);
        $this->offsetSet($id, $value);

        return $this;
    }
}
