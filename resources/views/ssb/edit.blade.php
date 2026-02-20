<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Edit SSB</h2>

        <form action="{{ route('ssb.update', $ssb) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1">Nama SSB</label>
                <input type="text" name="nama"
                       value="{{ $ssb->nama }}"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block mb-1">Alamat</label>
                <textarea name="alamat"
                          class="w-full border rounded px-3 py-2">{{ $ssb->alamat }}</textarea>
            </div>

            <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>