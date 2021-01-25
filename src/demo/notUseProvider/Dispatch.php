<?php
namespace MarketSdk;
use Winston\MaketSdk\Base\Base;

/**
 * Class Dispatch
 * @package Winston\MarketSdk
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
