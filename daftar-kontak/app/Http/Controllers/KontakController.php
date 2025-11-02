<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Auth::user()->kontaks()->latest()->get();
        return view('kontaks.index', compact('kontaks'));
    }

    public function create()
    {
        return view('kontaks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'alamat' => 'nullable|string',
        ]);

        Auth::user()->kontaks()->create($request->all());

        return redirect()->route('kontaks.index')
            ->with('success', 'Kontak berhasil ditambahkan!');
    }

    public function edit(Kontak $kontak)
    {
        if ($kontak->user_id !== Auth::id()) {
            abort(403);
        }
        return view('kontaks.edit', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        if ($kontak->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'alamat' => 'nullable|string',
        ]);

        $kontak->update($request->all());

        return redirect()->route('kontaks.index')
            ->with('success', 'Kontak berhasil diupdate!');
    }

    public function destroy(Kontak $kontak)
    {
        if ($kontak->user_id !== Auth::id()) {
            abort(403);
        }

        $kontak->delete();

        return redirect()->route('kontaks.index')
            ->with('success', 'Kontak berhasil dihapus!');
    }
}