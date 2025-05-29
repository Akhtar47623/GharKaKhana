<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
        protected $table = 'foods';
        protected $fillable = ['name', 'short_desc', 'image'];

        public function categories()
        {
                return $this->belongsToMany(Category::class);
        }
        public function menus()
        {
        return $this->belongsToMany(Menu::class)
                ->withPivot(['ingredients', 'toppings', 'drinks'])
                ->withTimestamps();
        }

}
