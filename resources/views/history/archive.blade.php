<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <div>
                <h2 class="font-extrabold text-xl text-gray-600">
                    {{ __('Archived Data Report') }} <span
                        class="text-indigo-400 font-extrabold">{{ $biro->biro->nama_biro }}</span>
                </h2>
            </div>
        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                    <h1 class="text-center font-extrabold text-gray-600 text-xl border-b-2 border-gray-200">Archived
                        Data</h1>
                    @foreach ($bulan as $databulan)
                        <div
                            class="flex justify-between space-y-2 bg-white shadow-md sm:rounded-lg mb-2 h-14 items-center mt-5 hover:scale-105 transition transform duration-500 cursor-pointer">
                            <div class="font-semibold text-gray-700 mx-5 flex "><svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-indigo-300 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ Carbon\Carbon::parse($databulan->tanggal)->translatedFormat('F Y') }}
                            </div>
                            <div class="mx-5">
                                <form action="/bulan/{{ $databulan->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="action" value="3">
                                    <button type="submit"
                                        class="text-gray-600 font-semibold text-xs hover:text-indigo-400 flex item-center"><svg
                                            class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                            </path>
                                        </svg><span for="" class="mt-1">Unarchived</span> </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2"> {{ $bulan->links() }}</div>
    </div>

</x-app-layout>
