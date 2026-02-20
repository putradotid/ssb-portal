<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Tambah SSB</h2>

        <form action="{{ route('ssb.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Nama SSB</label>
                <input type="text" name="nama"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block mb-1">Alamat</label>
                <textarea name="alamat"
                          class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>