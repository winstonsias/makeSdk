<?php
namespace MakeSdkTest\ServiceProviders;
use MakeSdkTest\Product\Product;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ProductServiceProvider implements ServiceProviderInterface{

    /**
     * @inheritDoc
     */
    public function register(Container $pimple)
    {
        $pimple['product'] = function ($pimple) {
            return new Product($pimple);
        };
    }
}
