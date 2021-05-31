<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
	use HasFactory,HasDateTimeFormatter;
    protected $table = 'admin_setting';


}
