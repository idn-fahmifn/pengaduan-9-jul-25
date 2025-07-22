<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-600 rounded-lg shadow-md p-6 flex justify-between items-center mb-8 dark:bg-slate-800">
                <h1 class="text-2xl font-bold text-white">Laporan Pengaduan</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
                <div class="grid grid-cols-1 mb-8">
                    <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-gray-600">Semua Laporan</h3>
                        <p class="text-3xl font-bold mt-2">{{ $total }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-gray-600">Pending</h3>
                        <p class="text-3xl font-bold mt-2">{{ $pending }}</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-gray-600">Diproses</h3>
                        <p class="text-3xl font-bold mt-2">{{ $diproses }}</p>
                    </div>

                    <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-gray-600">Selesai</h3>
                        <p class="text-3xl font-bold mt-2">{{ $selesai }}</p>
                    </div>

                    <div class="bg-white dark:bg-slate-800 dark:text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-gray-600">Ditolak</h3>
                        <p class="text-3xl font-bold mt-2">{{ $ditolak }}</p>
                    </div>
                </div>

            </div>


            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-slate-200">Laporan</h2>

                <div class="hidden md:grid grid-cols-12 gap-4 text-sm text-gray-500 font-semibold mb-2 px-4">
                    <div class="col-span-4">Judul Laporan</div>
                    <div class="col-span-2 text-center">Tanggal Pengaduan</div>
                    <div class="col-span-2 text-center">Jenis Pengaduan</div>
                    <div class="col-span-2 text-center">Status</div>
                    <div class="col-span-2 text-center">Pelapor</div>
                </div>

                <div class="space-y-4">
                    @foreach ($data as $item)
                        <a href="{{ route('petugas.laporan.show', $item->id) }}"
                            class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 dark:bg-slate-700 hover:bg-gray-100 dark:hover:bg-slate-600 p-4 rounded-lg">
                            <div class="col-span-1 md:col-span-4 flex items-center">
                                <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $item->judul }}</span>
                            </div>
                            <div class="col-span-1 md:col-span-2 text-center text-gray-700 dark:text-gray-100">
                                {{ $item->tanggal_pengaduan }}
                            </div>
                            <div class="col-span-1 md:col-span-2 text-center">
                                @if ($item->jenis_pengaduan == 'kerusakan')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Kerusakan</span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Kehilangan</span>
                                @endif

                            </div>
                            <div class="col-span-1 md:col-span-2 flex justify-center -space-x-2">
                                <div class="col-span-1 md:col-span-2 text-center">
                                    @if ($item->status == 'pending')
                                        <div class="col-span-1 md:col-span-2 text-center">
                                            <span
                                                class="bg-gray-100 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full">Pending</span>
                                        </div>
                                    @elseif ($item->status == 'diproses')
                                        <div class="col-span-1 md:col-span-2 text-center">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">Diproses</span>
                                        </div>
                                    @elseif ($item->status == 'selesai')
                                        <div class="col-span-1 md:col-span-2 text-center">
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Selesai</span>
                                        </div>
                                    @else
                                        <div class="col-span-1 md:col-span-2 text-center">
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Ditolak</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-1 md:col-span-2 text-center text-gray-700 dark:text-gray-100">Fahmi
                            </div>
                        </a>
                    @endforeach
                </div>

                @if ($data->isEmpty())
                    <div
                        class="flex justify-center items-center bg-gray-50 dark:bg-yellow-500 hover:bg-gray-100 dark:hover:bg-yellow-200 p-6 m-4 rounded-lg">
                        <span class="text-gray-700">Semua laporan sudah direspon</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
