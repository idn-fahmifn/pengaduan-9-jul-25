<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-600 rounded-lg shadow-md p-6 flex justify-between items-center mb-8 dark:bg-slate-800">
                <h1 class="text-2xl font-bold text-white">Laporan Saya</h1>
                <a href="#"
                    class="bg-white dark:bg-red-600 text-red-600 dark:text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 dark:hover:bg-red-800">
                    Buat Laporan Baru
                </a>
            </div>


            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-slate-200">Laporan Saya</h2>

                <div class="hidden md:grid grid-cols-12 gap-4 text-sm text-gray-500 font-semibold mb-2 px-4">
                    <div class="col-span-4">Judul Laporan</div>
                    <div class="col-span-2 text-center">Tanggal Pengaduan</div>
                    <div class="col-span-2 text-center">Jenis Pengaduan</div>
                    <div class="col-span-2 text-center">Status</div>
                </div>

                <div class="space-y-4">
                    @foreach ($data as $item)
                        <a href=""
                            class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 dark:bg-slate-700 hover:bg-gray-100 dark:hover:bg-slate-600 p-4 rounded-lg">
                            <div class="col-span-1 md:col-span-4 flex items-center">
                                <span
                                    class="font-semibold text-gray-900 dark:text-gray-100">{{ $item->judul }}</span>
                            </div>
                            <div class="col-span-1 md:col-span-2 text-center text-gray-700 dark:text-gray-100">
                                {{ $item->tanggal_pengaduan }}</div>
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
                        </a>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
