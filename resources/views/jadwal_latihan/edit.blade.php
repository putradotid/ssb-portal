<x-app-layout>
<div class="max-w-xl mx-auto py-8 px-4">

    <h2 class="text-2xl font-bold mb-6">Edit Jadwal Latihan</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal-latihan.update', $jadwal_latihan) }}"
          method="POST"
          class="space-y-4 bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        {{-- SSB --}}
        <div>
            <label class="block mb-2">SSB</label>
            <select name="ssb_id"
                    class="w-full border rounded px-3 py-2"
                    required>
                @foreach($ssbs as $ssb)
                    <option value="{{ $ssb->id }}"
                        {{ $jadwal_latihan->ssb_id == $ssb->id ? 'selected' : '' }}>
                        {{ $ssb->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal --}}
        <div>
            <label class="block mb-2">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   value="{{ old('tanggal', $jadwal_latihan->tanggal) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- Lokasi --}}
        <div>
            <label class="block mb-2">Lokasi</label>
            <input type="text"
                   name="lokasi"
                   value="{{ old('lokasi', $jadwal_latihan->lokasi) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div>
            <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Update
            </button>
        </div>

    </form>

</div>
</x-app-layout>