<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Order extends Model
{
    protected $table = 'order';
    protected $fillable =[
    			'id',
    			'thanhtien',
    			'datecomplete',
                'id_dv',
    			'id_taikhoan',
    			'id_status'
    		];
    public function user()
    {
        return $this->belongsTo('App\User','id', 'id_taikhoan');
    }
    public function status()
    {
        return $this->belongsTo('App\StatusOrder','id', 'id_status');
    }

}
