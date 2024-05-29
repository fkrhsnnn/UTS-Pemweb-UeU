<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class IndexController extends Controller
{
    public function dashboard()
    {
        $barang = Barang::all();
        return view('dashboard.index', compact('barang'));
    }
}
