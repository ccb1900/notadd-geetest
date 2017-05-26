<?php
/**
 * This file is part of Notadd.
 *
 * @author        TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-02-23 19:44
 */

namespace Notadd\GeeTest\Controllers;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\GeeTest\Handlers\GetHandler;
use Notadd\GeeTest\Handlers\SetHandler;

/**
 * Class GeeTestController.
 */
class GeeTestController extends Controller
{
    /**
     * Get handler.
     *
     * @param \Notadd\Baidu\Handlers\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Set handler.
     *
     * @param \Notadd\Baidu\Handlers\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
