<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-slate-200">Buat Laporan Baru</h2>


                {{-- form pengaduan --}}

                <form method="post" action="#" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <x-input-label for="name" :value="__('Judul laporan ')" />
                        <x-text-input id="title_report" name="title_report" type="text" class="mt-1 block w-full"
                            :value="old('title_report')" required autofocus autocomplete="title_report" />
                        <x-input-error class="mt-2" :messages="$errors->get('title_report')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="name" :value="__('Lokasi ')" />
                        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                            :value="old('location')" required autofocus autocomplete="location" />
                        <x-input-error class="mt-2" :messages="$errors->get('location')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="name" :value="__('Jenis Pengaduan ')" />
                        <select name="report_type" required class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="">
                            <option value="">Pilih Jenis Laporan</option>
                            <option value="kerusakan">Kerusakan</option>
                            <option value="kehilangan">Kehilangan</option>
                        </select>
                    </div>

                    <div class="mt-3">
                        <x-input-label for="name" :value="__('Dokumentasi ')" />
                        <x-text-input id="photo" name="photo" type="file" class="mt-1 p-6 block w-full"
                            :value="old('photo')" required autofocus autocomplete="photo" />
                        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                    </div>

                     <div class="mt-3">
                        <x-input-label for="name" :value="__('Deskripsi ')" />
                        <textarea name="desc" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="desc"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('desc')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>

                        {{-- @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        @endif --}}
                    </div>
                </form>


            </div>

        </div>
    </div>
</x-app-layout>
