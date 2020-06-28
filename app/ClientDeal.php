<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDeal extends Model
{
    protected $connection = 'mysql2';

    protected $guarded = [];

    public $timestamps = false;

}
