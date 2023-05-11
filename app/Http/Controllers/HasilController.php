<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $usahas = Usaha::all();
        return view('dashboard.hasil.index', compact('usahas'));
    }

    public function create()
    {
        return view('dashboard.penilaian.create');
    }
}
