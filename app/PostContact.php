<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostContact extends Model
{
    protected $table = 'post_contacts';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'message',
    ];
}
