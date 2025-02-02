<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content','user', 
    ];

    public function postUser()
    {
        return $this->hasOne(User::class,'id','user');
    }
}
