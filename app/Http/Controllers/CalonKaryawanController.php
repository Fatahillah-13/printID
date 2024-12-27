<?php

namespace App\Http\Controllers;

use App\Models\CalonKaryawan;
use Illuminate\Http\Request;

class CalonKaryawanController extends Controller
{
    public function index()
    {
        $calonKaryawans = CalonKaryawan::all();
        return view('dashboard', compact('calonKaryawans'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:calon_karyawans',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        CalonKaryawan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Calon karyawan berhasil ditambahkan.');
    }
}
