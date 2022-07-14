<?php

namespace App\Models\Menus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name'];


    public function submenu(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Submenu::class, 'menu_id');
    }

    public function allSubMenus()
    {
        return $this->hasMany(AllSubMenu::class, 'menu_id');
    }
}
