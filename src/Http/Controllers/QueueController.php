<?php namespace Laravie\Quemon\Http\Controllers;

use Laravie\Quemon\Model\FailedJob;
use Illuminate\Database\QueryException;
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

    /**
     * List of failed jobs.
     *
     * @return mixed
     */
    public function index()
    {
        try {
            $jobs = FailedJob::orderBy('id', 'DESC')->paginate();
        } catch (QueryException $e) {
            return $this->setup();
        }

        return view('laravie/quemon::index', compact('jobs'));
    }

    /**
     * Push failed job back to queue.
     *
     * @param  int  $id
     *
     * @return mixed
     */
    public function retry($id)
    {
        Artisan::call('queue:retry', compact('id'));

        return redirect(handles('orchestra::quemon'));
    }

    /**
     * Setup failed jobs migration.
     *
     * @return mixed
     */
    public function setup()
    {
        Artisan::call('queue:failed-table');
        Artisan::call('migrate');

        return redirect(handles('orchestra::quemon'));
    }
}
