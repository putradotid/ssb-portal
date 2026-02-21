<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Ssb;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('ssb');

        if ($request->ssb_id) {
            $query->where('ssb_id', $request->ssb_id);
        }

        if ($request->umur) {
            $query->where('umur', $request->umur);
        }

        if ($request->status !== null) {
            $query->where('status_aktif', $request->status);
        }

        $siswas = $query->latest()->paginate(10);
        $ssbs = Ssb::all();

        return view('siswa.index', compact('siswas', 'ssbs'));
    }

    public function create()
    {
        $ssbs = Ssb::all();
        return view('siswa.create', compact('ssbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ssb_id' => 'required|exists:ssbs,id',
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:5|max:25',
            'posisi' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->only('ssb_id', 'nama', 'umur', 'posisi');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $data['status_aktif'] = $request->has('status_aktif');

        Siswa::create($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        $ssbs = Ssb::all();
        return view('siswa.edit', compact('siswa', 'ssbs'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'ssb_id' => 'required|exists:ssbs,id',
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:5|max:25',
            'posisi' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->only('ssb_id', 'nama', 'umur', 'posisi');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('siswa', 'public');
        }

        $data['status_aktif'] = $request->has('status_aktif');

        $siswa->update($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dihapus.');
    }
}