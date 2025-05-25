<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index ()
    {
        $menus = Menu::all();
        $submenu = Menu::select('parent_id', DB::raw('COUNT(*) as total'))
            ->groupBy('parent_id')
            ->get();
        // dd($submenu);
        return view('layouts.app', compact('menus', 'submenu'));
    } 
}
