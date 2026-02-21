<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ssb;
use Barryvdh\DomPDF\Facade\Pdf;

class SsbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ssbs = Ssb::latest()->paginate(10);
        return view('ssb.index', compact('ssbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ssb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string'
        ]);

        Ssb::create($request->only('nama', 'alamat'));

        return redirect()->route('ssb.index')
            ->with('success', 'SSB berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ssb $ssb)
    {
        return view('ssb.edit', compact('ssb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ssb $ssb)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string'
        ]);

        $ssb->update($request->only('nama', 'alamat'));

        return redirect()->route('ssb.index')
            ->with('success', 'SSB berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ssb $ssb)
    {
        $ssb->delete();

        return redirect()->route('ssb.index')
            ->with('success', 'SSB berhasil dihapus.');
    }

    public function exportPdf(Ssb $ssb)
    {
        $ssb->load('siswas');

        $pdf = Pdf::loadView('pdf.pemain', compact('ssb'));

        return $pdf->download('daftar-pemain-'.$ssb->nama.'.pdf');
    }
}
