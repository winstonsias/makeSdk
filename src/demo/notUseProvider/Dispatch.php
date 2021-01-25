<?php
namespace MakeSdkTest;
use Winston\MakeSdk\Base\Base;

/**
 * Class Dispatch
 * @package MakeSdkTest
 * @method lists
 */
class Dispatch extends Base {
    private $product;
    public function __construct($config)
    {
        parent::__construct($config);
        $this->product = new Product([]);
    }
    public function __call($name, $arguments)
    {
        return $this->product->{$name}(...$arguments);
    }
}
