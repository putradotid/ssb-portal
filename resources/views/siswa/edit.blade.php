<x-app-layout>
<div class="max-w-3xl mx-auto py-8 px-4">

    <h2 class="text-2xl font-bold mb-6">Edit Siswa</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa) }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-6 bg-white p-6 rounded-lg shadow">

        @csrf
        @method('PUT')

        {{-- SSB --}}
        <div>
            <label class="block mb-2 font-medium">Pilih SSB</label>
            <select name="ssb_id" class="w-full border rounded px-3 py-2" required>
                @foreach($ssbs as $ssb)
                    <option value="{{ $ssb->id }}" 
                        {{ $siswa->ssb_id == $ssb->id ? 'selected' : '' }}>
                        {{ $ssb->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama --}}
        <div>
            <label class="block mb-2 font-medium">Nama Siswa</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $siswa->nama) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- Umur --}}
        <div>
            <label class="block mb-2 font-medium">Umur</label>
            <input type="number" name="umur"
                   value="{{ old('umur', $siswa->umur) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- Posisi --}}
        <div>
            <label class="block mb-2 font-medium">Posisi</label>
            <input type="text" name="posisi"
                   value="{{ old('posisi', $siswa->posisi) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- Foto Lama --}}
        @if($siswa->foto)
            <div>
                <label class="block mb-2 font-medium">Foto Saat Ini</label>
                <img src="{{ asset('storage/'.$siswa->foto) }}"
                     class="w-24 h-24 object-cover rounded mb-2">
            </div>
        @endif

        {{-- Upload Foto Baru --}}
        <div>
            <label class="block mb-2 font-medium">Ganti Foto</label>
            <input type="file" name="foto"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-2">
            <input type="checkbox" name="status_aktif" value="1"
                {{ $siswa->status_aktif ? 'checked' : '' }}>
            <label>Status Aktif</label>
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