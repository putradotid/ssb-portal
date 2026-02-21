<x-app-layout>
<div class="max-w-xl mx-auto py-8 px-4">

    <h2 class="text-2xl font-bold mb-6">Tambah Jadwal Turnamen</h2>

    <form action="{{ route('jadwal-turnamen.store') }}"
          method="POST"
          class="space-y-4 bg-white p-6 rounded shadow">

        @csrf

        <div>
            <label class="block mb-2">SSB</label>
            <select name="ssb_id" class="w-full border rounded px-3 py-2" required>
                @foreach($ssbs as $ssb)
                    <option value="{{ $ssb->id }}">{{ $ssb->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2">Nama Turnamen</label>
            <input type="text" name="nama_turnamen"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div>
            <label class="block mb-2">Tanggal</label>
            <input type="date" name="tanggal"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div>
            <label class="block mb-2">Lokasi</label>
            <input type="text" name="lokasi"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <button class="px-4 py-2 bg-indigo-600 text-white rounded">
            Simpan
        </button>

    </form>

</div>
</x-app-layout>