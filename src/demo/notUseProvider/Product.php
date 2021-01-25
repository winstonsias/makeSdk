<?php
namespace MakeSdkTest;

class Product extends Api {

    public function lists()
    {
        $http = $this->getHttp();
        return $http->get("http://www.httpbin.org")->getBody();
    }
}
