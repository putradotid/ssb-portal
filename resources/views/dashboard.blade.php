<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Dashboard Overview
            </h2>

            {{-- Statistik Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Total SSB</p>
                    <h3 class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $totalSSB }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Total Siswa</p>
                    <h3 class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $totalSiswa }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Jadwal Latihan</p>
                    <h3 class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $totalLatihan }}
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-gray-500 text-sm">Jadwal Turnamen</p>
                    <h3 class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $totalTurnamen }}
                    </h3>
                </div>

            </div>

            {{-- Quick Access --}}
            <div class="mt-10">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                    Quick Access
                </h3>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('ssb.index') }}"
                       class="px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Manage SSB
                    </a>

                    <a href="{{ route('siswa.index') }}"
                       class="px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Manage Siswa
                    </a>

                    <a href="{{ route('jadwal-latihan.index') }}"
                       class="px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Jadwal Latihan
                    </a>

                    <a href="{{ route('jadwal-turnamen.index') }}"
                       class="px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Jadwal Turnamen
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>