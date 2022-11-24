@section('title', 'Create User')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col">
                            <div>
                                <x-input-label for="name" class="text-xl" :value="__('Name')" />
                
                                <x-text-input id="name" class="w-full px-4 py-2"
                                                type="text"
                                                name="name"
                                                required/>
                
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>   
                            <div class="mt-4">
                                <x-input-label for="password" class="text-xl" :value="__('Password')" />
                
                                <x-text-input id="password" class="w-full px-4 py-2"
                                                type="password"
                                                name="password"
                                                required/>
                
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>     
                            <div class="mt-4">
                                <x-input-label for="email" class="text-xl" :value="__('Email')" />
                
                                <x-text-input id="email" class="w-full px-4 py-2"
                                                type="email"
                                                name="email"
                                                required/>
                
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>      
                            <div class="my-4">
                                <x-input-label for="role" class="text-xl" :value="__('Role')" />
                
                                <input type="radio" id="student" name="role" value="student">
                                <label for="student">Student</label>
                                {{-- if company profile created, can set this on --}}
                                {{-- <input type="radio" id="company" name="role" value="company">
                                <label for="company">Company</label><br> --}}
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>    
                        </div>
                        <button type="submit" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                           