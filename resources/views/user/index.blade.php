<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <div class="container mx-auto px-4">

                <!-- Column 1 -->
                <div class="max-w-full mx-auto border border-gray-200" x-data="{ selected: 1 }">
                    <ul class="shadow-box">
                        <li class="relative border-b border-gray-200">
                            <button type="button" class="bg-white w-full px-6 py-6 text-left"
                                @click="selected !== 1 ? selected = 1 : selected = null">
                                <div class="flex items-center justify-between"> <span> Add a User
                                    </span>
                                    <svg :class="{ 'transform rotate-180': selected == 1 }"
                                        class="w-5 h-5 text-gray-500" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                x-ref="container1"
                                x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="max-w-2xl mx-auto p-6">
                                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            <form method="POST" action="{{ route('users.store') }}">
                                                @csrf
                                                <!-- Name -->
                                                <div>
                                                    <x-input-label for="name" :value="__('Name')" />
                                                    <x-text-input id="name" class="block mt-1 w-full"
                                                        type="text" name="name" :value="old('name')" required
                                                        autofocus autocomplete="name" />
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                                <!-- Email Address -->
                                                <div class="mt-4">
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input id="email" class="block mt-1 w-full"
                                                        type="email" name="email" :value="old('email')" required
                                                        autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>

                                                <!-- Password -->
                                                <div class="mt-4">
                                                    <x-input-label for="password" :value="__('Password')" />

                                                    <x-text-input id="password" class="block mt-1 w-full"
                                                        type="password" name="password" required
                                                        autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="mt-4">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password" name="password_confirmation" required
                                                        autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>
                                                @role('Super-Admin')
                                                    <div class="grid grid-cols-4 gap-1 mt-2">
                                                        @if (count($roles) > 0)
                                                            @foreach ($roles as $role)
                                                                <div class="mt-1">
                                                                    <label for="role-{{ $role->id }}">
                                                                        <input type="checkbox" class="rounded"
                                                                            name="roles[]" id="role-{{ $role->id }}"
                                                                            value="{{ $role->name }}">
                                                                        {{ $role->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                @endrole
                                                <div class="flex items-center mt-4">
                                                    <x-primary-button class="ms-4">
                                                        {{ __('Add User') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="relative border-b border-gray-200">
                            <button type="button" class="bg-white w-full px-6 py-6 text-left"
                                @click="selected !== 2 ? selected = 2 : selected = null">
                                <div class="flex items-center justify-between"> <span> Users List </span>
                                    <svg :class="{ 'transform rotate-180': selected == 2 }"
                                        class="w-5 h-5 text-gray-500" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                x-ref="container2"
                                x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            <table class="min-w-full bg-white dark:bg-gray-800 border-collapse">
                                                <thead class="bg-gray-100 dark:bg-gray-700 border-b">
                                                    <tr>
                                                        <th class="py-2 px-4 border text-left dark:text-gray-300">Name
                                                        </th>
                                                        <th class="py-2 px-4 border text-left dark:text-gray-300">Email
                                                        </th>
                                                        <th class="py-2 px-4 border text-left dark:text-gray-300">
                                                            Assigned Roles</th>
                                                        <th class="py-2 px-4 border text-left dark:text-gray-300">
                                                            Assigned Permissions</th>
                                                        <th class="py-2 px-4 border text-left dark:text-gray-300">
                                                            Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                    <!-- Example rows -->
                                                    @foreach ($users as $user)
                                                        @php
                                                            $roleNames = $user->getRoleNames();
                                                            $permissions = $user->getAllPermissions();
                                                            $loggedInUserRoles = auth()->user()->getRoleNames();
                                                        @endphp
                                                        @if ($loggedInUserRoles->contains('Super-Admin') || !$roleNames->contains('Super-Admin'))
                                                            <tr>
                                                                <td class="py-2 px-4 border dark:border-gray-700">
                                                                    {{ $user->name }}</td>
                                                                <td class="py-2 px-4 border dark:border-gray-700">
                                                                    {{ $user->email }}</td>
                                                                <td class="py-2 px-4 border dark:border-gray-700">
                                                                    @if ($roleNames->isNotEmpty())
                                                                        @foreach ($roleNames as $roleName)
                                                                            <span
                                                                                class="bg-blue-500 rounded text-white text-xs p-1">{{ $roleName }}</span>
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td class="py-2 px-4 border dark:border-gray-700">
                                                                    @if ($permissions->isNotEmpty())
                                                                        @foreach ($permissions as $permission)
                                                                            <span
                                                                                class="bg-green-500 rounded text-white text-xs p-1">{{ $permission->name }}</span>
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td class="py-2 px-4 border dark:border-gray-700">
                                                                    <div class="flex gap-2 items-center">
                                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                                            class="text-decoration-none text-white font-bold py-1 px-2 rounded dark:bg-yellow-700 dark:hover:bg-yellow-900">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="blue" viewBox="0 0 24 24"
                                                                                stroke-width="1.5"
                                                                                stroke="currentColor" class="size-6">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                            </svg>
                                                                        </a> |
                                                                        <form
                                                                            action="{{ route('users.destroy', $user->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="text-decoration-none text-white font-bold py-1 px-2 rounded dark:bg-red-700 dark:hover:bg-red-900">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="red" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor"
                                                                                    class="size-6">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</x-app-layout>
