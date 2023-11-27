<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';

    public $timestamps = true;

    protected $guarded = [];

    protected $hidden = ['updated_at', 'deleted_at'];
}
