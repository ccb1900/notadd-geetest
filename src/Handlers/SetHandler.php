<?php
/**
 * This file is part of Notadd.
 *
 * @author        TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-02-23 19:45
 */

namespace Notadd\GeeTest\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Passport\Abstracts\SetHandler as AbstractSetHandler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class ConfigurationHandler.
 */
class SetHandler extends AbstractSetHandler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * SetHandler constructor.
     *
     * @param \Illuminate\Container\Container                         $container
     * @param \Notadd\Foundation\Setting\Contracts\SettingsRepository $settings
     */
    public function __construct(
        Container $container,
        SettingsRepository $settings
    ) {
        parent::__construct($container);
        $this->messages->push($this->translator->trans('notadd-geetest::setting.success'));
        $this->settings = $settings;
    }

    /**
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        return $this->settings->all()->toArray();
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $prefix = "extension.waterloocode/notadd-geetest";
        $this->settings->set($prefix . '.appid', $this->request->input('appid'));
        $this->settings->set($prefix . '.appkey', $this->request->input('appkey'));
        $this->settings->set($prefix . '.enabled', $this->request->input('enabled'));

        return true;
    }
}
