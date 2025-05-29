<?php

namespace App\Repositories\Menu;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface MenuRepositoryInterface
{
    public function all();

    public function createMenu(Request $request);
}
