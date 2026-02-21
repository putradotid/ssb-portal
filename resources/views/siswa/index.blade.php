<x-app-layout>
<div class="max-w-7xl mx-auto py-8 px-4">

    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-bold">Daftar Siswa</h2>
        <a href="{{ route('siswa.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded">
            + Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label class="block text-sm mb-1">SSB</label>
            <select name="ssb_id" class="border rounded px-3 py-2">
                <option value="">Semua</option>
                @foreach($ssbs as $ssb)
                    <option value="{{ $ssb->id }}"
                        {{ request('ssb_id') == $ssb->id ? 'selected' : '' }}>
                        {{ $ssb->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm mb-1">Umur</label>
            <input type="number" name="umur"
                value="{{ request('umur') }}"
                class="border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm mb-1">Status</label>
            <select name="status" class="border rounded px-3 py-2">
                <option value="">Semua</option>
                <option value="1" {{ request('status') === "1" ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="0" {{ request('status') === "0" ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
        </div>

        <div>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                Filter
            </button>
        </div>
    </form>

    <div class="bg-white shadow rounded-lg overflow-x-auto">

        {{-- Tabel siswa --}}
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Foto</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">SSB</th>
                    <th class="p-3">Umur</th>
                    <th class="p-3">Posisi</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswas as $siswa)
                <tr class="border-t">
                    <td class="p-3">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/'.$siswa->foto) }}"
                                 class="w-12 h-12 object-cover rounded">
                        @endif
                    </td>
                    <td class="p-3">{{ $siswa->nama }}</td>
                    <td class="p-3">{{ $siswa->ssb->nama }}</td>
                    <td class="p-3">{{ $siswa->umur }}</td>
                    <td class="p-3">{{ $siswa->posisi }}</td>
                    <td class="p-3">
                        @if($siswa->status_aktif)
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                Aktif
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('siswa.edit', $siswa) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('siswa.destroy', $siswa) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $siswas->links() }}
    </div>

</div>
</x-app-layout>