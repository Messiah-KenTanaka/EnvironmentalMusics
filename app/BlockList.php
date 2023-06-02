<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockList extends Model
{
    protected $table = 'block_list';

    protected $fillable = [
        'user_id',
        'blocked_user_id'
    ];
}
