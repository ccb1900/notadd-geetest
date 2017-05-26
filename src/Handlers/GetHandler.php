<?php
/**
 * This file is part of Notadd.
 *
 * @author        TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-04-10 19:41
 */

namespace Notadd\GeeTest\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Passport\Abstracts\DataHandler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class GetHandler.
 */
class GetHandler extends DataHandler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * GetHandler constructor.
     *
     * @param \Illuminate\Container\Container                         $container
     * @param \Notadd\Foundation\Setting\Contracts\SettingsRepository $settings
     */
    public function __construct(Container $container, SettingsRepository $settings)
    {
        parent::__construct($container);
        $this->settings = $settings;
    }

    /**
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        $prefix = "extension.waterloocode/notadd-geetest";

        return [
            'appid'   => $this->settings->get($prefix . '.appid', ''),
            'appkey'  => $this->settings->get($prefix . '.appkey', ''),
            'enabled' => $this->settings->get($prefix . '.enabled', ''),
        ];
    }
}
