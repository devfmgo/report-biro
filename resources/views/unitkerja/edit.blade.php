<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Unit Kerja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/unitkerja/{{$kerja->id}}">
                        @csrf
                        @method('put')
                        <div>
                            <x-label for="biro_id" :value="__('Unit Kerja')" />
                            <select name="biro_id" id="" class="
                                capitalize rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full
                              " >
                                <option value="">Pilih Unit Kerja</option>
                                @foreach($biro as $data)
                                    <option value="{{$data->id}}" {{$data->id === $kerja->biro_id ? 'selected':''}}>{{$data->nama_biro}}</option>
                                @endforeach
                            </select>
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