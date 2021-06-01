<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ApiNotice extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'api_notice';
    
}
