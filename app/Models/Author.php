<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'gender', 
        'birth_date', 'phone', 'address', 'email', 'comment'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}