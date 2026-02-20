<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar SSB</h2>

            <a href="{{ route('ssb.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                + Tambah SSB
            </a>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Card --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider">
                                Nama
                            </th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-600 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($ssbs as $ssb)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-800 font-medium">
                                    {{ $ssb->nama }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $ssb->alamat ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-center space-x-2">

                                    <a href="{{ route('ssb.edit', $ssb) }}"
                                    class="text-blue-600 hover:underline font-medium">
                                        Edit
                                    </a>

                                    <form action="{{ route('ssb.destroy', $ssb) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600 hover:underline font-medium">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                                    Belum ada data SSB.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $ssbs->links() }}
        </div>

    </div>
</x-app-layout>