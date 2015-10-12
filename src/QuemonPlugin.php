<?php namespace Laravie\Quemon;

use Orchestra\Extension\Plugin;
use Laravie\Quemon\Http\Handlers\QuemonMenuHandler;

class QuemonPlugin extends Plugin
{
    /**
     * Menu handler.
     *
     * @var string
     */
    protected $menu = QuemonMenuHandler::class;
}
