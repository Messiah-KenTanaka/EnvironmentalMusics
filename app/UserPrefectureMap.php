<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPrefectureMap extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prefecture',
    ];
}
