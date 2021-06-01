<?php

namespace App\Admin\Repositories;

use App\Models\ApiNotice as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ApiNotice extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
