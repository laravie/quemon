<?php namespace Laravie\Quemon\Http\Handlers;

use Orchestra\Foundation\Support\MenuHandler;
use Orchestra\Contracts\Authorization\Authorization;

class QuemonMenuHandler extends MenuHandler
{
    /**
     * Menu configuration.
     *
     * @var array
     */
    protected $menu = [
        'id'    => 'quemon',
        'title' => 'Queue Monitor',
        'link'  => 'orchestra::quemon',
        'icon'  => null,
    ];
    /**
     * Get position.
     *
     * @return string
     */
    public function getPositionAttribute()
    {
        return $this->handler->has('extensions') ? '^:extensions' : '>:home';
    }
    /**
     * Check whether the menu should be displayed.
     *
     * @param  \Orchestra\Contracts\Authorization\Authorization $acl
     *
     * @return bool
     */
    public function authorize(Authorization $acl)
    {
        return $acl->can('manage-orchestra');
    }
}
