<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = 'dv';
    protected $fillable =[
    			'id',
    			'name',
    			'mota',
    			'id_loaidv',
    			'id_kieudv',
    			'giatien'
    		];
    public function loaidv()
    {
        return $this->belongsTo('App\Loaidv','id', 'id_loaidv');
    }
    public function kieudv()
    {
        return $this->belongsTo('App\Kieudv','id', 'id_kieudv');
    }
    public $timestamps = true;
}
