<x-app-layout>
<div class="max-w-3xl mx-auto py-8 px-4">

    <h2 class="text-2xl font-bold mb-6">Tambah Siswa</h2>

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-6 bg-white p-6 rounded-lg shadow">

        @csrf

        {{-- SSB --}}
        <div>
            <label class="block mb-2 font-medium">Pilih SSB</label>
            <select name="ssb_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih SSB --</option>
                @foreach($ssbs as $ssb)
                    <option value="{{ $ssb->id }}" {{ old('ssb_id') == $ssb->id ? 'selected' : '' }}>
                        {{ $ssb->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama --}}
        <div>
            <label class="block mb-2 font-medium">Nama Siswa</label>
            <input type="text" name="nama"
                   value="{{ old('nama') }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- Umur --}}
        <div>
            <label class="block mb-2 font-medium">Umur</label>
            <input type="number" name="umur"
                   value="{{ old('umur') }}"
                   class="w-full border rounded px-3 py-2"
                   min="5" max="25"
                   required>
        </div>

        {{-- Posisi --}}
        <div>
            <label class="block mb-2 font-medium">Posisi</label>
            <input type="text" name="posisi"
                   value="{{ old('posisi') }}"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Contoh: Striker, Kiper"
                   required>
        </div>

        {{-- Foto --}}
        <div>
            <label class="block mb-2 font-medium">Foto (Opsional)</label>
            <input type="file" name="foto"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Status Aktif --}}
        <div class="flex items-center gap-2">
            <input type="checkbox" name="status_aktif" value="1"
                   {{ old('status_aktif') ? 'checked' : '' }}>
            <label>Status Aktif</label>
        </div>

        {{-- Button --}}
        <div>
            <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Simpan
            </button>
        </div>

    </form>

</div>
</x-app-layout>