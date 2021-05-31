<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'personal_access_tokens';
    
    public function user(){
        return $this->belongsTo(User::class, 'tokenable_id');
    }
}
