<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <p>{{ $user_info->name }}</p>
                    <p>{{ $user_info->id }}</p>
                    <p>{{ $user_info->student_profile->student_id }}</p>
                    <p>{{ $user_info->student_profile->student_resume }}</p>
                    <a href="{{ route('student_profile.edit',$user_info->id) }}">Edit</a>
                    {{-- change image name --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>