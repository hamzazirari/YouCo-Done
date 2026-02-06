<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['user_id','name','ville','capacity','cuisine',];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function favorites()
{
    return $this->belongsToMany(User::class, 'user_favorites');
}

}
