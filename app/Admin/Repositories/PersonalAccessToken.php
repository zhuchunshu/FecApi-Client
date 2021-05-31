<?php

namespace App\Admin\Repositories;

use App\Models\PersonalAccessToken as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class PersonalAccessToken extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
