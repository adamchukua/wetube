<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function chat()
    {
        return $this->hasOne(Chat::class);
    }
}
