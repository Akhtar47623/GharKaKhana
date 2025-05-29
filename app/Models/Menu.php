<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function foods()
    {
        return $this->belongsToMany(Food::class)
            ->withPivot(['ingredients', 'toppings', 'drinks'])
            ->withTimestamps();
    }
}
