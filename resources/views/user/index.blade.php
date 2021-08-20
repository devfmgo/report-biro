<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Account') }}
        </h2>
        <a href="user/create"
            class=" text-xs float-right bg-purple-400 rounded-full px-8 text-white font-extrabold p-3 relative bottom-7">
            Create New User</a>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">

                    <table class="min-w-max w-full table-auto">
                        <thead class="">
                            <tr class=" text-white bg-indigo-400 uppercase text-xs leading-normal ">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Nama Lengkap</th>
                                {{-- <th class="py-3 px-6 text-left">Unit Kerja</th> --}}
                                <th class="py-3 px-6 text-left">Role</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-xs font-medium">
                            @foreach ($users as $data)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left capitalize">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-3 px-6 text-left capitalize">
                                        {{ $data->username }}
                                    </td>

                                    {{-- <td class="py-3 px-6 text-left">
                                        {{ $data->nama_biro }}
                                    </td> --}}
                                    <td class="py-3 px-6 text-left">
                                        {{ $data->display_name }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex flex-row space-x-4">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-green-500 cursor-pointer hover:text-green-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-yellow-300 cursor-pointer hover:text-yellow-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-indigo-500 cursor-pointer hover:text-indigo-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
