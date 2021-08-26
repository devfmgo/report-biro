<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <div>
                <h2 class="font-extrabold text-xl text-gray-600 leading-tight">
                    {{ __('Report Kerja') }} <span
                        class="text-indigo-400 font-extrabold">{{ $biro->biro->nama_biro }}</span>
                </h2>
            </div>

            <div>
                <a href="/bulan/create"
                    class="bg-indigo-400 font-semibold p-2 rounded-full px-4 hover:bg-indigo-500 text-white text-sm">
                    Add Month</a>
            </div>
        </div>

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <table class="border-collapse w-full">
                    <thead class="text-xs">
                        <tr class="font-medium text-left">
                            <th class="p-2  text-indigo-400 uppercase border-b-2 border-gray-300 hidden lg:table-cell ">
                                Deskripsi</th>
                            <th class="p-2  text-indigo-400 uppercase border-b-2 border-gray-300 hidden lg:table-cell ">
                                List Kerja</th>

                    </thead>
                    <tbody>
                        @foreach ($kerja as $datakerja)
                            <tr
                                class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 text-xs font-medium text-gray-600 capitalize">
                                <td class="w-full lg:w-auto p-2  border-b lg:table-cell relative lg:static">
                                    {{ $datakerja->deskripsi->deskripsi }}</td>
                                <td class="w-full lg:w-auto p-2   border-b lg:table-cell relative lg:static">
                                    {{ $datakerja->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($bulan->count() === 0)
        <div class="py-12">
            <div class="flex flex-col items-center mt-5">

                <h1 class="text-3xl font-extrabold text-gray-300 text-center">Data is Empty</h1>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-64 w-64 text-gray-200 text-center" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
        </div>
    @endif

    <div class="py-12">
        @foreach ($bulan as $databulan)

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{-- text report laporan --}}
                        <div class="flex justify-between ">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>

                                <span class="text-gray-600 font-semibold">Report Laporan <label
                                        class="bg-yellow-100 rounded-full p-2 text-gray-900">{{ Carbon\Carbon::parse($databulan->tanggal)->translatedFormat('F Y') }}</label></span>
                                <label
                                    class="bg-indigo-200 p-2 rounded-full shadow-sm cursor-pointer hover:bg-indigo-400"
                                    onclick="toggleModal('modal-id{{ $databulan->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-50"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="">
                                <form action="/bulan/{{ $databulan->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="action" value="2">
                                    <button type="submit"
                                        class="text-gray-600 font-semibold text-xs hover:text-indigo-400 flex item-center"><svg
                                            class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                            </path>
                                        </svg><span for="" class="mt-1">Archived</span> </button>
                                </form>

                            </div>
                        </div>

                        <hr class="mt-2 border-b-1 text-gray-400">

                        <table class="border-collapse w-full mt-4">
                            <thead class="text-xs">
                                <tr class="font-medium">
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        List</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        P1</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        P2</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        P3</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        P4</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        AVG%</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        Kendala</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        Catatan</th>
                                    <th
                                        class="p-3  uppercase border-b-2 border-gray-300 text-gray-600 hidden lg:table-cell ">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($kerja as $datakerja)
                                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row
                                flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 text-xs font-medium text-gray-600 ">

                                        {{-- View List Kerja --}}
                                        <td class="text-left w-full lg:w-auto p-3 border-b lg:table-cell relative lg:static
                                ">
                                            {{ $datakerja->title }}
                                        </td>

                                        {{-- View P1 --}}
                                        <td class="w-full lg:w-auto p-3 border-b lg:table-cell relative lg:static
                                text-center">

                                            @php
                                                
                                                $historyP1 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP1 as $datahistory)
                                                @php
                                                    $data_target = json_decode($datahistory->P1);
                                                    $data_hasil  = json_decode($datahistory->P2);
                                                @endphp
                                                @if ($datahistory->id_bukti_kerja === $datakerja->id && $datahistory->id_bulan === $databulan->id)
                                                    <div class="bg-green-100 rounded-full flex p-2 items-center">
                                                        <span class="text-green-700 font-bold ">
                                                            {{ $d1 = $data_target->target_p1 }}</span> /
                                                        <span class="{{ $data_target->target_p1 == $data_hasil->hasil_p1 ? 'text-green-700' : 'text-red-500' }}
                                                font-bold">
                                                            {{ $data_hasil->hasil_p1 }}
                                                        </span>
                                                    </div>
                                                @endif
                                            @empty
                                                <div
                                                    class="bg-green-100 rounded-full flex p-2 text-center font-bold text-green-700">
                                                    0 / 0 </div>
                                            @endforelse

                                        </td>

                                        {{-- View P2 --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b    lg:table-cell relative lg:static text-center">
                                            @php
                                                $historyP2 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP2->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id) as $datahistory)
                                                @php
                                                    $data_target = json_decode($datahistory->P1);
                                                    $data_hasil  = json_decode($datahistory->P2);
                                                @endphp
                                                @if ($datahistory->id_bukti_kerja === $datakerja->id && $datahistory->id_bulan === $databulan->id)
                                                    <div class="bg-green-100 rounded-full flex p-2"><span
                                                            class="text-green-700 font-bold">
                                                            {{ $d2 = $data_target->target_p2 }}</span> / <span
                                                            class="{{ $data_target->target_p2 == $data_hasil->hasil_p2 ? 'text-green-700' : 'text-red-500' }} font-bold">{{ $data_hasil->hasil_p2 }}</span>
                                                    </div>
                                                @endif
                                            @empty
                                                <div
                                                    class="bg-green-100 rounded-full flex p-2 text-center font-bold text-green-700">
                                                    0 / 0 </div>
                                            @endforelse
                                        </td>

                                        {{-- View P3 --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b   lg:table-cell relative lg:static text-center">
                                            @php
                                                $historyP3 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP3 as $datahistory)
                                                @php
                                                    $data_target = json_decode($datahistory->P1);
                                                    $data_hasil  = json_decode($datahistory->P2);
                                                @endphp
                                                @if ($datahistory->id_bukti_kerja === $datakerja->id && $datahistory->id_bulan === $databulan->id)
                                                    <div class="bg-green-100 rounded-full flex p-2"> <span
                                                            class="text-green-700 font-bold">
                                                            {{ $d3 = $data_target->target_p3 }}</span> / <span
                                                            class="{{ $data_target->target_p3 == $data_hasil->hasil_p3 ? 'text-green-700' : 'text-red-500' }} font-bold">{{ $data_hasil->hasil_p3 }}</span>
                                                    </div>
                                                @endif
                                            @empty
                                                <div
                                                    class="bg-green-100 rounded-full flex p-2 text-center font-bold text-green-700">
                                                    0 / 0 </div>
                                            @endforelse
                                        </td>

                                        {{-- View P4 --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b   lg:table-cell relative lg:static text-center">
                                            @php
                                                $historyP4 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP4 as $datahistory)
                                                @php
                                                    $data_target = json_decode($datahistory->P1);
                                                    $data_hasil  = json_decode($datahistory->P2);
                                                @endphp

                                                @if ($datahistory->id_bukti_kerja === $datakerja->id && $datahistory->id_bulan === $databulan->id)
                                                    <div class="bg-green-100 rounded-full flex p-2"><span
                                                            class="text-green-700 font-bold">
                                                            {{ $d4 = $data_target->target_p4 }}</span> / <span
                                                            class="{{ $data_target->target_p4 == $data_hasil->hasil_p4 ? 'text-green-700' : 'text-red-500' }} font-bold">{{ $data_hasil->hasil_p4 }}</span>
                                                    </div>
                                                @endif
                                            @empty
                                                <div
                                                    class="bg-green-100 rounded-full flex p-2 text-center font-bold text-green-700">
                                                    0 / 0 </div>
                                            @endforelse
                                        </td>

                                        {{-- View Total --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b   lg:table-cell relative lg:static text-left">
                                            @php
                                                $historyP5 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP5 as $datahistory)
                                                @php
                                                    $data_target = json_decode($datahistory->P1);
                                                    $data_hasil  = collect(json_decode($datahistory->P2));
                                                @endphp
                                                <div
                                                    class="bg-yellow-200 rounded-full p-2 font-bold text-gray-900 text-center">

                                                    @if ($datakerja->id === 8)
                                                        {{ ceil(($data_hasil->sum() / 4 / $biro->biro->jum_staff) * 100) }}
                                                    @else
                                                        {{ ceil($data_hasil->sum() / 4) }}
                                                    @endif
                                                </div>
                                            @empty
                                                <div
                                                    class="bg-yellow-200 rounded-full p-2 font-bold text-gray-900 text-center">
                                                    0 </div>
                                            @endforelse
                                        </td>

                                        {{-- View kendala --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b   lg:table-cell relative lg:static text-center">
                                            @php
                                                $historyP6 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP6 as $datahistory)
                                                @if ($datahistory->kendala !== null)
                                                    <div class="relative sm:max-w-xl sm:mx-auto">
                                                        <div
                                                            class="group cursor-pointer relative inline-block text-center">
                                                            <a href="#" class="hover:text-indigo-500 ">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                            <div
                                                                class="opacity-0 w-52 mb-1 bg-yellow-100 text-black shadow-lg text-left text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full -left-1/2  px-3 pointer-events-none">
                                                                {{ $datahistory->kendala }}
                                                                <svg class="absolute text-yellow-100 h-2  right-35 top-full"
                                                                    x="0px" y="0px" viewBox="0 0 255 255"
                                                                    xml:space="preserve">
                                                                    <polygon class="fill-current"
                                                                        points="0,0 127.5,127.5 255,0" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    -
                                                @endif

                                            @empty
                                                -
                                            @endforelse
                                        </td>

                                        {{-- View catatan --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b   lg:table-cell relative lg:static text-center">
                                            @php
                                                $historyP7 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP7 as $datahistory)
                                                @if ($datahistory->catatan !== null)
                                                    <div class="relative sm:max-w-xl sm:mx-auto">
                                                        <div
                                                            class="group cursor-pointer relative inline-block text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6 hover:text-indigo-500" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                            </svg>
                                                            <div
                                                                class="opacity-0 w-52 mb-1 bg-yellow-100 text-black shadow-lg text-left text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full -left-1/2  px-3 pointer-events-none">
                                                                {{ $datahistory->catatan }}
                                                                <svg class="absolute text-yellow-100 h-2  right-35 top-full"
                                                                    x="0px" y="0px" viewBox="0 0 255 255"
                                                                    xml:space="preserve">
                                                                    <polygon class="fill-current"
                                                                        points="0,0 127.5,127.5 255,0" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    -
                                                @endif

                                            @empty
                                                -
                                            @endforelse

                                        </td>

                                        {{-- View Action --}}
                                        <td
                                            class="w-full lg:w-auto p-3   border-b   lg:table-cell relative lg:static text-left">
                                            @php
                                                $historyP8 = $history->where('id_bukti_kerja', $datakerja->id)->where('id_bulan', $databulan->id);
                                            @endphp
                                            @forelse ($historyP8 as $datahistory)

                                                <a href="/history/{{ $datahistory->id }}/edit"
                                                    class="text-gray-100 font-bold bg-blue-400 w-24 p-2 rounded-full text-xs shadow-sm block">Update
                                                    Data</a>
                                            @empty
                                                <form action="{{ route('history.create') }}" method="GET">

                                                    <input type="hidden" name="id_bukti_kerja"
                                                        value="{{ $datakerja->id }}">
                                                    <input type="hidden" name="id_bulan"
                                                        value="{{ $databulan->id }}">
                                                    <button type="submit"
                                                        class="text-gray-100 font-bold bg-yellow-500 w-24 p-2 rounded-full text-xs shadow-sm block">Add
                                                        Data</button>
                                                </form>
                                            @endforelse
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <label class="text-xs font-semibold text-gray-400">* Note : Target/Hasil</label>
                    </div>
                </div>
            </div>


            {{-- modal edit bulan --}}
            <div class=" mt-12 hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                id="modal-id{{ $databulan->id }}">
                <div class="relative w-auto my-6 mx-auto max-w-xl ">
                    <!--content-->
                    <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-96 bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div
                            class="flex items-start justify-between  border-0 border-solid border-blueGray-200 rounded-t">

                            <button
                                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                onclick="toggleModal('modal-id{{ $databulan->id }}')">
                                <span
                                    class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                    ×
                                </span>
                            </button>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto justify-center">

                            <form action="/bulan/{{ $databulan->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="my-4">
                                    <label class="font-semibold text-sm text-gray-700">Tanggal</label>
                                    <input type="hidden" name="action" value="1">
                                    <x-input id="bulan" class="block mt-1 w-full mx-1" type="date" name="tanggal"
                                        placeholder="P1" required autofocus autocomplete="off"
                                        value="{{ $databulan->tanggal }}" />
                                </div>

                        </div>
                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                            <div class="flex justify-center space-x-1 items-center">

                                <div>
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-blue-500 border border-blue-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-600">Update</button>
                                    </form>
                                </div>
                                <div class=""><a href="/history"
                                        class="mb-2 md:mb-0 bg-white px-5 py-2.5 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"
                                        onclick="toggleModal('modal-id')">
                                        Cancel
                                    </a>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            {{-- modal --}}
        @endforeach
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2"> {{ $bulan->links() }}</div>
    </div>

</x-app-layout>
