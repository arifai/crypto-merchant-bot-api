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
        'tele_chat_id', 'firstname', 'lastname', 'username', 'email', 'point', 'is_active'
    ];
}
