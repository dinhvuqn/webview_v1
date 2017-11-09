<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaidv extends Model
{
    protected $table = 'loaidv';
    protected $fillable =[
    			'id',
    			'name',
    			'name_seo'
    		];

    public function dichvus()
    {
        return $this->hasMany('App\DichVu','id_loaidv', 'id');
    }
    public $timestamps = true;
}
