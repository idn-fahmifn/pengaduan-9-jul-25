<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-600 rounded-lg shadow-md p-6 flex justify-between items-center mb-8 dark:bg-slate-800">
                <h1 class="text-2xl font-bold text-white">Data Petugas</h1>

                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'respon')">{{ __('Tambah Petugas') }}</x-danger-button>

            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-md sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-slate-200">Petugas</h2>

                <div class="hidden md:grid grid-cols-12 gap-4 text-sm text-gray-500 font-semibold mb-2 px-4">
                    <div class="col-span-4">Nama</div>
                    <div class="col-span-2 text-center">Email</div>
                </div>

                <div class="space-y-4">
                    @foreach ($data as $item)
                        <a href=""
                            class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 dark:bg-slate-700 hover:bg-gray-100 dark:hover:bg-slate-600 p-4 rounded-lg">
                            <div class="col-span-1 md:col-span-4 flex items-center">
                                <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $item->name }}</span>
                            </div>
                            <div class="col-span-1 md:col-span-2 text-center text-gray-700 dark:text-gray-100">
                                {{ $item->email }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <x-modal name="respon" focusable>
        <form method="post" action="{{ route('user.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Tambah Petugas') }}
            </h2>

            <div class="mt-3">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="mt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"
                    required autofocus autocomplete="email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Tambah') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
