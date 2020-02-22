<?php declare(strict_types=1);

namespace App\Http\Controller;

use \Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Message\Response;


/**
 * Class FooController
 * @Controller(prefix="ship")
 */
class FooController
{
    /**
     * @RequestMapping(route="aa")
     *
     * @return Response;
     */
    function test()
    {
        go(function () {
            echo microtime(true) . PHP_EOL;
        });
        return context()->getResponse()->withContent((string)microtime(true));
    }
}
