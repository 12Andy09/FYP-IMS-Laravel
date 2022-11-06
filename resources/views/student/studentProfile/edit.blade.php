<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    <p class="text-danger">Errors</p>
                </div>
                <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('student_profile.update',$user_info->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $user_info->name }}" placeholder="Name">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Student ID:</strong>
                            <input type="text" name="student_id" value="{{ $user_info->student_profile->student_id }}" placeholder="Student ID">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <img src="{{ asset('profile/'.$user_info->student_profile->student_photo) }}" alt="Profile Photo" width="500" height="600">
                            <strong>Profile Image Upload (Image):</strong>
                            <input type="file" name="profile" />
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Resume Upload (PDF):</strong>
                            <input type="file" name="resume" />
                        </div>
                        <x-primary-button class="ml-4">
                            Save Changes
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>