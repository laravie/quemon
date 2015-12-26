<?php namespace Laravie\Quemon\Http\Controllers;

use Laravie\Quemon\Model\FailedJob;
use Illuminate\Support\Facades\Artisan;
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
        $this->middleware('orchestra.can:manage-orchestra');
        $this->middleware('orchestra.csrf', ['only' => 'retry']);
    }

    public function index()
    {
        $jobs = FailedJob::orderBy('id', 'DESC')->paginate();

        return view('laravie/quemon::index', compact('jobs'));
    }

    public function retry($id)
    {
        Artisan::call('queue:retry', compact('id'));

        return redirect(handles('orchestra::quemon'));
    }
}
