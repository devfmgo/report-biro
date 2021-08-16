
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bukti Kerja') }}
        </h2>
        <a href="/buktikerja/create" class=" text-xs float-right bg-purple-400 rounded-full px-8 text-white font-extrabold p-3 relative bottom-7">
            Create Bukti Kerja</a>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">

                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class=" text-white bg-indigo-400 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left font-semibold">Deskripsi</th>
                                <th class="py-3 px-6 text-left font-semibold">Title</th>
                                <th class="py-3 px-6 text-center font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($kerja as $data)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left capitalize font-medium">
                                    {{$data->deskripsi->title}}
                                 </td>

                                <td class="py-3 px-6 text-left capitalize font-medium">
                                  {{$data->title}}

                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">

                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="/buktikerja/{{$data->id}}/edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>

                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <button class="w-4 text-red-600" type="button" onclick="toggleModal('modal-id{{$data->id}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>

                                </td>
                                <div class="mt-12 hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id{{$data->id}}">
                                    <div class="relative w-auto my-6 mx-auto max-w-xl">
                                        <!--content-->
                                        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                            <!--header-->
                                            <div class="flex items-start justify-between  border-0 border-solid border-blueGray-200 rounded-t">

                                                <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                                                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                        ×
                                                    </span>
                                                </button>
                                            </div>
                                            <!--body-->
                                            <div class="relative p-6 flex-auto text-center  justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                                                    <p class="text-sm text-gray-500 px-8">Yakin data akan dihapus</p>
                                            </div>
                                            <div class="p-3  mt-2 text-center space-x-4 md:block">
                                                <div class="flex justify-center space-x-1">
                                                    <div class=""><button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100" onclick="toggleModal('modal-id{{$data->id}}')">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <form action="/buktikerja/{{$data->id}}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
