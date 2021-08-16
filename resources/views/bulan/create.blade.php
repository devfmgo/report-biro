<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="/bulan" method="post">
                        @csrf
                        <div class="my-4">
                            <label class="font-semibold text-sm text-gray-700">Tanggal</label>

                            <x-input id="bulan" class="block mt-1 w-full mx-1" type="date" name="tanggal"  placeholder="P1" required autofocus autocomplete="off" />
                        </div>

                        <div class="flex items-center justify-end mt-4">


                            <x-button class="ml-3 bg-blue-400 text-gray-50 font-extrabold">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>