<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chat_id', 'firstname', 'lastname', 'username', 'email', 'balance', 'point', 'is_verified'
    ];
}
