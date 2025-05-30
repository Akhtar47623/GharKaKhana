<?php

namespace App\Repositories\Menu;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface MenuRepositoryInterface
{
    public function all();
    public function createMenu(Request $request);
    public function delete(string $uuid): bool;
    public function show($id);

}
