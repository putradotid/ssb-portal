<?php

namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use App\Models\Ssb;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    public function index()
    {
        $jadwals = JadwalLatihan::with('ssb')->latest()->paginate(10);
        return view('jadwal_latihan.index', compact('jadwals'));
    }

    public function create()
    {
        $ssbs = Ssb::all();
        return view('jadwal_latihan.create', compact('ssbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ssb_id' => 'required|exists:ssbs,id',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255'
        ]);

        JadwalLatihan::create($request->all());

        return redirect()->route('jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil ditambahkan.');
    }

    public function edit(JadwalLatihan $jadwal_latihan)
    {
        $ssbs = Ssb::all();
        return view('jadwal_latihan.edit', compact('jadwal_latihan', 'ssbs'));
    }

    public function update(Request $request, JadwalLatihan $jadwal_latihan)
    {
        $request->validate([
            'ssb_id' => 'required|exists:ssbs,id',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255'
        ]);

        $jadwal_latihan->update($request->all());

        return redirect()->route('jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil diperbarui.');
    }

    public function destroy(JadwalLatihan $jadwal_latihan)
    {
        $jadwal_latihan->delete();

        return redirect()->route('jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil dihapus.');
    }
}