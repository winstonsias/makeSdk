<?php
namespace MakeSdkTest;
use MakeSdkTest\ServiceProviders\ProductServiceProvider;
use Winston\MakeSdk\Base;

/**
 * Class Dispatch
 * @package MakeSdkTest
 * @method lists
 */
class Dispatch extends Base {
    protected $providers = [
        ProductServiceProvider::class
    ];

}
