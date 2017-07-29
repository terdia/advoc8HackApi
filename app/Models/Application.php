<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'bio', 'country', 'state', 'address', 'type',
        'gender', 'purpose', 'marital_status', 'status', 'contact_number',
        'occupation', 'avatar', 'first_name', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'deleted_at',
    ];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
