<?php

namespace App\Http\Controllers;
use App\Models\Loket;

use Illuminate\Http\Request;

class LoketController extends Controller
{
    public function index()
    {
        $lokets = Loket::all();
        return view('loket.dashboard', compact('lokets'));
    }

    public function create()
    {
        return view('loket.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan => required|string|max:255',
        ]);

        Loket::create($validate);

        return redirect()->route('loket.dashboard')->with('success', 'Loket berhasil ditambahkan');
    }

    public function show(Loket $loket)
    {
        return view('loket.view', compact('loket'));
    }

    public function edit(Loket $loket)
    {
        return view('loket.edit', compact('loket'));
    }
}
