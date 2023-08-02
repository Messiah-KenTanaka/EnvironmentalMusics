<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserPrefectureMap extends Model
{
    protected $fillable = [
        'user_id',
        'prefecture',
    ];

}