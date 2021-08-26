<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <div>
                <h2 class="font-extrabold text-xl text-gray-600 leading-tight">
                    {{ __('Report Kerja Biro') }}
                </h2>
            </div>

            <div>
                {{-- <a href="/bulan/create"
                    class="bg-indigo-400 font-semibold p-2 rounded-full px-4 hover:bg-indigo-500 text-white text-sm">
                    Add Month</a> --}}
            </div>
        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                    <table class="border-collapse w-full">
                        <thead>
                            <tr class=" text-white bg-indigo-400 uppercase text-xs leading-normal">

                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Nama Lengkap</th>
                                <th class="py-3 px-6 text-left">Biro</th>
                                <th class="py-3 px-6 text-center">CR Month</th>
                                <th class="py-3 px-6 text-center">AVG Month</th>
                                <th class="py-3 px-6 text-left">...</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-xs font-light">
                            @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-100 font-semibold text-gray-600">

                                    <td class="py-3 px-6 text-left">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $user->name }}
                                    </td>

                                    <td class="py-3 px-6 text-left">
                                        {{ $user->nama_biro }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{$bulan->where('users_id',$user->id)->count()}}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        10%
                                    </td>

                                    <td class="py-3 px-6 text-left w-32">
                                        <a href="#"
                                            class="flex space-x-2 text-xs items-center hover:text-indigo-500"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                            </svg> View All</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>