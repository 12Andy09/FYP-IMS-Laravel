@section('title', 'Edit User')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <div>
                                <x-input-label for="name" class="text-xl" :value="__('Name')" />
                
                                <x-text-input id="name" class="w-full px-4 py-2" type="text" name="name" :value='$user->name' required />
                
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>         
                            <div class="mt-4">
                                <x-input-label for="email" class="text-xl" :value="__('Email')" />
                
                                <x-text-input id="email" class="w-full px-4 py-2"
                                                type="text"
                                                name="email"
                                                :value='$user->email'
                                                required/>
                
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>     
                            {{-- <div class="mt-4">
                                <x-input-label for="role" class="text-xl" :value="__('Role')" />
                                <div class="flex items-center mb-4">
                                    <input type="radio" id="student" name="role" value="student"  @if($user->role == "student") checked @endif>
                                    <label for="student" class="mr-2">Student</label>
                                    <input type="radio" id="company" name="role" value="company" @if($user->role == "company") checked @endif>
                                    <label for="company" class="mr-2">Company</label><br>
                                    <input type="radio" id="admin" name="role" value="admin" @if($user->role == "admin") checked @endif>
                                    <label for="admin" class="mr-2">Admin</label><br>
                                </div>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>       --}}
                        </div>
                        <button type="submit" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                           