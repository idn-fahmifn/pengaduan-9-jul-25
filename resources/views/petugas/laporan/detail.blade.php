<x-app-layout>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-4">

                @if ($data->status == 'pending')
                    <div class="flex items-center">


                        {{-- bullet untuk pending --}}
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full border-2 border-blue-600 p-1">
                                <div class="w-full h-full rounded-full bg-blue-600"></div>
                            </div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500 uppercase">pending</p>
                            </div>
                        </div>

                        {{-- garis proses --}}
                        <div class="flex-1 h-1 bg-gradient-to-r from-blue-600 to-blue-200"></div>

                        {{-- diproses --}}
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-blue-200"></div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-400 uppercase">diproses</p>
                            </div>
                        </div>
                        {{-- selesai --}}
                        <div class="flex-1 h-1 bg-blue-200"></div>
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-blue-200"></div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-400">SELESAI</p>
                            </div>
                        </div>
                    </div>
                @elseif($data->status == 'diproses')
                    <div class="flex items-center">
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500">PENDING</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 bg-teal-600"></div>
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full border-2 border-blue-600 p-1">
                                <div class="w-full h-full rounded-full bg-blue-600"></div>
                            </div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500">DIPROSES</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 bg-gradient-to-r from-blue-600 to-blue-200"></div>
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-blue-200"></div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-400">SELESAI</p>
                            </div>
                        </div>
                    </div>
                @elseif($data->status == 'selesai')
                    <div class="flex items-center">
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500">PENDING</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 bg-teal-600"></div>
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500 uppercase">diproses</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 bg-teal-600"></div>
                        <div class="flex flex-col items-center text-center w-32">
                            <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </div>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500 uppercase">selesai</p>
                            </div>
                        </div>
                    </div>
                @else
                    <span class="text-red-600">Laporan anda ditolak</span>
                @endif
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    {{-- Grid utama untuk 2 kolom --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">

                        <div class="flex flex-col justify-center">
                            <div>
                                <h3 class="text-lg lg:text-lg font-bold text-gray-900 dark:text-gray-100">
                                    {{ $data->judul }}
                                </h3>

                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    Dibuat pada : {{ $data->tanggal_pengaduan }}
                                </p>
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    Lokasi : {{ $data->lokasi }}
                                </p>
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    Jenis Pengaduan : {{ $data->jenis_pengaduan }}
                                </p>
                                <p class="text-md text-gray-900 dark:text-gray-400 mt-2">
                                    {{ $data->deskripsi }}
                                </p>

                            </div>
                        </div>

                        <div class="flex items-center justify-center p-4">
                            <img src="{{ asset('storage/images/laporan/' . $data->dokumentasi) }}"
                                class="w-full h-auto max-h-[500px] object-contain rounded-lg">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="w-full flex justify-between">
                    <h1 class="text-lg text-slate-900 dark:text-gray-100">Respon Laporan</h1>
                    {{-- area button respon --}}
                    <x-primary-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'respon')">{{ __('Respon') }}</x-danger-button>
                </div>
            </div>
        </div>
    </div>


    {{-- modal --}}
    <x-modal name="respon" focusable>
        <form method="post" action="{{route('petugas.laporan.post', $data->id)}}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Respon Laporan') }}
            </h2>

            <div class="mt-3">
                <x-input-label for="name" :value="__('Respon ')" />
                <textarea name="respon"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    id="respon"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('respon')" />
            </div>

            <div class="mt-3">
                <x-input-label for="status" :value="__('Status Laporan')" />
                <select name="status" required
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    id="">
                    <option value="diproses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Respon') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
