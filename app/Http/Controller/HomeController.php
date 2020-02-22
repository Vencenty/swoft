<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use Swoft;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function context;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        /** @var Renderer $renderer */
        $renderer = Swoft::getBean('view');
        $content = $renderer->render('home/index');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/hi")
     *
     * @return Response
     */
    public function hi(): Response
    {
        return context()->getResponse()->withContent('hi');
    }

    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     */
    public function hello(string $name): Response
    {
        $name = [
            'age' => 10,
            'name'=>'tom',
            'sex' => '男的',
            'info' => '你想做什么'
        ];
        return context()->getResponse()->withContent(json_encode($name));
    }


    /**
     * @RequestMapping("/show[/{age}]")
     * @param int age
     *
     * @return Response
     */
    public function show($age)
    {
        return context()->getResponse()->withContent("你好,我今年{$age}岁了");
    }
}
