<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'access_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'access_token','password', 'created_at', 'updated_at', 'deleted_at',
    ];

    public $timestamps = true;

    public function application(){
        return $this->hasOne('App\Models\Application');
    }
}
