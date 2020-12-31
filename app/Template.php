<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'template_master';
    
	protected $fillable = [
        'template_name', 'status', 'camp_logo','content'
    ];
}
