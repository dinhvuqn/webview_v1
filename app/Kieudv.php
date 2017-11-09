<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kieudv extends Model
{
    protected $table = 'kieudv';
    protected $fillable =[
    			'id',
    			'name',
    			'donvigia'
    		];
    public $timestamps = true;

    public function dichvus()
    {
        return $this->hasMany('App\DichVu','id_kieudv', 'id');
    }
    public function soluongs()
    {
        return $this->hasMany('App\SoLuong','id_kieudv', 'id');
    }
}
