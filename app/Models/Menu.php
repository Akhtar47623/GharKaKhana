<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['day'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'menu_items')
                    ->withPivot('meal_type')
                    ->withTimestamps();
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}

