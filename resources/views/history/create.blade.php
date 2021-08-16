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

                    <form action="/history" method="post">
                        <input type="hidden" name="id_bukti_kerja" value="{{$id_bukti_kerja}}">
                        <input type="hidden" name="id_bulan" value="{{$id_bulan}}">
                        @csrf
                        @php
                         if ($id_bukti_kerja == 8) {
                            $value = $biro;
                         }else {
                             $value = "";
                         }
                        @endphp

                        <div class="my-4">
                            <label class="font-semibold text-sm text-gray-700">Target Pekanan</label>
                            <div class="flex justify-between">
                                <x-input id="bulan" class="block mt-1 w-full mx-1" type="number" name="target_p1"  placeholder="P1" value="{{$value}}" required autofocus autocomplete="off" />
                                <x-input id="bulan" class="block mt-1 w-full mx-1" type="number" name="target_p2"  placeholder="P2" value="{{$value}}" required autofocus autocomplete="off" />
                                <x-input id="bulan" class="block mt-1 w-full mx-1" type="number" name="target_p3"  placeholder="P3" value="{{$value}}" required autofocus autocomplete="off"/>
                                <x-input id="bulan" class="block mt-1 w-full mx-1" type="number" name="target_p4"  placeholder="P4" value="{{$value}}" required autofocus autocomplete="off"/>
                            </div>

                        </div>
                        <div>
                            <label class="font-semibold text-sm text-gray-700">Kendala</label>
                            <textarea name="kendala" id="" cols="30" rows="5" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full mx-1"></textarea>
                        </div>
                        <div class="my-4">
                            <label class="font-semibold text-sm text-gray-700">Catatan</label>
                            <textarea name="catatan" id="" cols="30" rows="5" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full mx-1"></textarea>
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