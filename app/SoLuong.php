<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoLuong extends Model
{
    protected $table = 'soluong';
    protected $fillable =[
    			'id',
    			'giatri',
    			'id_kieudv'
    		];

    public function kieudv()
    {
        return $this->belongsTo('App\Kieudv','id', 'id_kieudv');
    }
    public $timestamps = true;
}
