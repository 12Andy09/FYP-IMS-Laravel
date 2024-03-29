@section('title', 'Profile')
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Profile
        </h2>
    </x-slot>
    <main class="profile-page">
        <section class="relative block h-500-px">
          <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('{{asset('images/profile_background.jpg')}}');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
          </div>
          <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
              <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
          <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
              <div class="px-6">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                    <div class="relative">
                        <img src="{{ asset('profile/'.$user->student_profile->student_photo) }}" alt="Profile Photo" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px bg-white">
                    </div>
                  </div>
                  <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                    <div class="py-6 px-3 mt-32 sm:mt-0">
                    </div>
                  </div>
                  <div class="w-full lg:w-4/12 px-4 lg:order-1">
                  </div>
                </div>
                <div class="text-center mt-12">
                  <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
                    {{ $user->name }}
                  </h3>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">mail</i>
                    Email: 
                    <span class="text-blueGray-600 font-normal">
                      {{ $user->email }}
                    </span>
                  </div>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">school</i>
                    Education: 
                    <span class="text-blueGray-600 font-normal">
                      {{ $user->student_profile->student_education }}
                    </span>
                  </div>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">person</i>
                    Student ID: 
                    <span class="text-blueGray-600 font-normal">
                      {{ $user->student_profile->student_id }}
                    </span>
                  </div>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">library_books</i>
                    Resume: 
                    @if (file_exists(('resume/'.$user->student_profile->student_resume) ))
                    <a class="underline" href="{{ asset('resume/'.$user->student_profile->student_resume) }}" target="_blank">View Resume</a>
                    @else
                    Resume not uploaded yet
                    @endif
                  </div>
                </div>
                <div class="text-center mt-12">
                  <span class="text-xl font-semibold leading-normal text-blueGray-700 mb-2 text-indigo-600">
                    About Me
                  </span>
                <div class="py-10 border-t-2 border-indigo-500 text-center">
                  <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                      <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                        {{ $user->student_profile->student_aboutMe }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>
    {{-- <div class="py-12">
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
    </div> --}}
</x-app-layout>