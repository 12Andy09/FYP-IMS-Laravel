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
                    <p><span class="font-bold text-base"> Profile: </span><img src="{{ asset('profile/'.$user_info->student_profile->student_photo) }}" alt="Profile Photo" width="200" height="200"></p>
                    <p><span class="font-bold text-base"> Name:</span> {{ $user_info->name }}</p>
                    <p><span class="font-bold text-base"> Student ID: </span>{{ $user_info->student_profile->student_id }}</p>
                    <p><span class="font-bold text-base"> Email: </span>{{ $user_info->email }}</p>
                    <p><span class="font-bold text-base"> Education: </span>{{ $user_info->student_profile->student_education }}</p>
                    <p><span class="font-bold text-base"> View Resume: </span> View </p>
                    <p><span class="font-bold text-base"> AboutMe: </span>{{ $user_info->student_profile->student_aboutMe }}</p>
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('student_profile.edit',$user_info->id) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>