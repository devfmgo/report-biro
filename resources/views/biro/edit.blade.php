<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Biro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="Post" action="/biro/{{$biro->id}}">
                        @csrf
                        @method('put')
                        <!-- Email Address -->
                        <div>
                            <x-label for="nama_biro" :value="__('Nama Biro')" />

                            <x-input id="nama_biro" class="block mt-1 w-full" type="text"  value="{{$biro->nama_biro}}" name="nama_biro" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="jum_staff" :value="__('Jumlah Staff')" />

                            <x-input id="jum_staff" class="block mt-1 w-full"
                            value="{{$biro->jum_staff}}"
                                            type="number"
                                            name="jum_staff"
                                            required autocomplete="current-jum_staff" />
                        </div>

                        <div class="flex items-center justify-end mt-4">


                            <x-button class="ml-3 bg-blue-400 text-gray-50 font-extrabold">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>