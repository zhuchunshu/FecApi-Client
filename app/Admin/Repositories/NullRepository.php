<?php

namespace App\Admin\Repositories;

use App\Models\AdminSetting as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class NullRepository extends EloquentRepository
{
    protected $eloquentClass = Model::class;

}
