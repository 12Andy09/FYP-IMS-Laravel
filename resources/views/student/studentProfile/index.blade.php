<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Profile
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
                    <p><span class="font-bold text-base"> Name:</span> {{ $user_info->name }}</p>
                    <p><span class="font-bold text-base"> Student ID: </span>{{ $user_info->student_profile->student_id }}</p>
                    <p><span class="font-bold text-base"> Profile: </span><img src="{{ asset('profile/'.$user_info->student_profile->student_photo) }}" alt="Profile Photo" width="500" height="600"></p>
                    <a class="text-3xl font-bold underline" href="{{ route('student_profile.edit',$user_info->id) }}">Edit</a>
                    {{-- change image name --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>