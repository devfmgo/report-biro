<x-app-layout>
    <x-slot name="header">
        <div class="py-2">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" bg-gray-50 border-b border-gray-200 p-5">
                        <h2 class="font-2xl font-extrabold text-gray-600 text-center mb-4">Register New Account
                        </h2>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="/user">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />

                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required />
                            </div>

                            <!-- Choose Role  -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Role User')" />
                                <select name="role_id" id=""
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="admin">Administrator</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a> --}}

                                <x-button class="ml-4">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
