<?php namespace Laravie\Quemon\Model;

use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('queue.failed.database'));

        $this->setTable(config('queue.failed.table'));
    }
}
