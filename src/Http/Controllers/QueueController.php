<?php namespace Laravie\Quemon\Http\Controllers;

use Laravie\Quemon\Model\FailedJob;
use Orchestra\Foundation\Http\Controllers\AdminController;

class QueueController extends AdminController
{
    /**
     * Setup controller middleware.
     *
     * @return void
     */
    protected function setupMiddleware()
    {
        $this->middleware('orchestra.auth');
    }

    public function index()
    {
        return FailedJob::all();
    }
}
