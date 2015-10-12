<?php namespace Laravie\Quemon;

use Illuminate\Support\Fluent;
use Orchestra\Extension\Plugin;
use Laravie\Quemon\Http\Handlers\QuemonMenuHandler;
use Orchestra\Contracts\Html\Form\Builder as FormBuilder;

class QuemonPlugin extends Plugin
{
    /**
     * Menu handler.
     *
     * @var string
     */
    protected $menu = QuemonMenuHandler::class;

    /**
     * Setup the form.
     *
     * @param  \Illuminate\Support\Fluent  $model
     * @param  \Orchestra\Contracts\Html\Form\Builder  $form
     *
     * @return void
     */
    protected function form(Fluent $model, FormBuilder $form)
    {
        //
    }
}
