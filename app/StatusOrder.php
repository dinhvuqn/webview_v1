<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    protected $table = 'statusorder';
    protected $fillable =[
    			'id',
    			'name',
    			'noidung'
    		];

    public function orders()
    {
        return $this->hasMany('App\Order','id_status', 'id');
    }
    public $timestamps = true;
}
