<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likeable';
    #white list
    protected $fillable = ['user_id'];

    public function likeable()
    {
        return $this->morphTo();
    }

    #получить пользователя, владеющим данным лайком
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
