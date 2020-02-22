<?php

namespace App\Http\Controller;

use Swoft\Context\Context;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * 商品类
 * @Controller()
 */
class GoodsController
{

    private $name;
    private $age;

    /**
     * @RequestMapping(route="/goods",method="get")
     */
    public function index()
    {
        $response = Context::get()->getResponse();
        $request = Context::get()->getRequest();

        return $response->withHeader("content-type", "application/json")
            ->withData([
                $request->getServerParams(),
                [
                    'tom' => 'age',
                    'sex' => 'male'
                ]
            ]);
    }

    /**
     *
     * @RequestMapping(route="/goods/{id}", params={"id"="\d+"},method={"get"})
     */
    public function show(int $id)
    {
        return Context::get()->getResponse()->withData([
            'infos' => '你传递进来的ID为: ' . $id
        ]);
    }
}
