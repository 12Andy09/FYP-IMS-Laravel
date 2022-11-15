@section('title', 'Profile')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><span class="font-bold text-base"> Name:</span> {{ $user->name }}</p>
                    <p><span class="font-bold text-base"> Profile: </span>@if($user->student_profile->student_photo != null)<img src="{{ asset('profile/'.$user->student_profile->student_photo) }}" alt="Profile Photo" width="200" height="200"> @else Image Not Provided @endif</p>
                    <p><span class="font-bold text-base"> Name:</span> {{ $user->name }}</p>
                    <p><span class="font-bold text-base"> Student ID: </span>{{ $user->student_profile->student_id }}</p>
                    <p><span class="font-bold text-base"> Email: </span>{{ $user->email }}</p>
                    <p><span class="font-bold text-base"> Education: </span>{{ $user->student_profile->student_education }}</p>
                    <p><span class="font-bold text-base"> View Resume: </span> View </p>
                    <p><span class="font-bold text-base"> AboutMe: </span>{{ $user->student_profile->student_aboutMe }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>