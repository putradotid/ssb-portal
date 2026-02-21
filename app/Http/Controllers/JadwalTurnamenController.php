<?php

namespace App\Http\Controllers;

use App\Models\JadwalTurnamen;
use App\Models\Ssb;
use Illuminate\Http\Request;

class JadwalTurnamenController extends Controller
{
    public function index()
    {
        $turnamens = JadwalTurnamen::with('ssb')->latest()->paginate(10);
        return view('jadwal_turnamen.index', compact('turnamens'));
    }

    public function create()
    {
        $ssbs = Ssb::all();
        return view('jadwal_turnamen.create', compact('ssbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ssb_id' => 'required|exists:ssbs,id',
            'nama_turnamen' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255'
        ]);

        JadwalTurnamen::create($request->all());

        return redirect()->route('jadwal-turnamen.index')
            ->with('success', 'Jadwal turnamen berhasil ditambahkan.');
    }

    public function edit(JadwalTurnamen $jadwal_turnamen)
    {
        $ssbs = Ssb::all();
        return view('jadwal_turnamen.edit', compact('jadwal_turnamen', 'ssbs'));
    }

    public function update(Request $request, JadwalTurnamen $jadwal_turnamen)
    {
        $request->validate([
            'ssb_id' => 'required|exists:ssbs,id',
            'nama_turnamen' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255'
        ]);

        $jadwal_turnamen->update($request->all());

        return redirect()->route('jadwal-turnamen.index')
            ->with('success', 'Jadwal turnamen berhasil diperbarui.');
    }

    public function destroy(JadwalTurnamen $jadwal_turnamen)
    {
        $jadwal_turnamen->delete();

        return redirect()->route('jadwal-turnamen.index')
            ->with('success', 'Jadwal turnamen berhasil dihapus.');
    }
}