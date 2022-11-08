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
                            <p>
                                <strong>Current Profile Image:</strong>
                                <img src="{{ asset('profile/'.$user_info->student_profile->student_photo) }}" alt="Profile Photo" width="500" height="600">
                            </p>
                            <p>
                                <strong>Upload New Profile Image:</strong>
                                <input type="file" name="profile" />
                            </p>
                            <p>
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{ $user_info->name }}" placeholder="Name">
                                <strong>Student ID:</strong>
                                <input type="text" name="student_id" value="{{ $user_info->student_profile->student_id }}" placeholder="Student ID">
                            </p>
                            <p>
                                <strong class='align-top'>Education:</strong>
                                <textarea type="text" name="education" placeholder="My Education" rows="5" cols="50">{{ $user_info->student_profile->student_education }}</textarea>
                            </p>
                            <p>
                                <strong class='align-top'>About Me:</strong>
                                <textarea type="text" name="aboutMe" placeholder="About Me" rows="5" cols="50">{{ $user_info->student_profile->student_aboutMe }}</textarea>
                            </p>
                            <p>
                                <strong>Upload Resume (PDF):</strong>
                                <input type="file" name="resume" />
                            </p>
                        </div>
                        
                        {{-- Submit and cancel --}}
                        <div class='mt-5'>
                        <a href="{{url()->previous()}}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>