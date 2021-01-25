<?php
namespace MakeSdkTest;
use MakeSdkTest\ServiceProviders\ProductServiceProvider;
use Winston\MaketSdk\Base\Base;

/**
 * Class Dispatch
 * @package Winston\MarketSdk
 * @method lists
 */
class Dispatch extends Base {
    protected $providers = [
        ProductServiceProvider::class
    ];

}
