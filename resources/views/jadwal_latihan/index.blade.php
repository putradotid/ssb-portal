<x-app-layout>
<div class="max-w-7xl mx-auto py-8 px-4">

    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-bold">Jadwal Latihan</h2>
        <a href="{{ route('jadwal-latihan.create') }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded">
            + Tambah Jadwal
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">SSB</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Lokasi</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $jadwal)
                <tr class="border-t">
                    <td class="p-3">{{ $jadwal->ssb->nama }}</td>
                    <td class="p-3">{{ $jadwal->tanggal }}</td>
                    <td class="p-3">{{ $jadwal->lokasi }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('jadwal-latihan.edit', $jadwal) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('jadwal-latihan.destroy', $jadwal) }}"
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
        {{ $jadwals->links() }}
    </div>

</div>
</x-app-layout>