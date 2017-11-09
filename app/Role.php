<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable =[
    			'id',
    			'name'
    		];

    public function users()
    {
        return $this->hasMany('App\User','id_role', 'id');
    }
    public $timestamps = true;
}
