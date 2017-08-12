<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $table = 'admin';
    public $timestamps = false;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

}
