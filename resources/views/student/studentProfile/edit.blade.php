@section('title', 'Edit Profile')
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profile
        </h2>
    </x-slot>

    <main class="profile-page">
        <section class="relative block h-500-px">
            <form action="{{ route('student_profile.update',$user_info->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        <img id="profile_photo" src="{{ asset('profile/'.$user_info->student_profile->student_photo) }}" alt="Profile Photo" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px bg-white">
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
                    <p class="text-lg underline text-blueGray-600 font-normal my-5">
                        <input type="file" id="profile" name="profile" class="hidden" onchange="document.getElementById('profile_photo').src = window.URL.createObjectURL(this.files[0])"/>
                        <label for="profile">Click me to upload profile</label>
                    </p>
                  <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
                    <strong class="text-xl">Name:</strong>
                    <input type="text" name="name" value="{{ $user_info->name }}" placeholder="Name">
                  </h3>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">mail</i>
                    Email: 
                    <span class="text-blueGray-600 font-normal">
                    @can('isAdmin')
                    <input type="text" name="email" value="{{ $user_info->email }}" placeholder="Email" class="w-80">
                    @else
                    {{ $user_info->email }}
                    @endcan 
                    </span>
                  </div>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">school</i>
                    <span class="align-top">Education:</span> 
                    <span class="text-blueGray-600 font-normal">
                        <textarea type="text" name="education" placeholder="My Education" rows="3" cols="30">{{ $user_info->student_profile->student_education }}</textarea>
                    </span>
                  </div>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-middle mb-2 text-gray-800">person</i>
                    Student ID: 
                    <span class="text-blueGray-600 font-normal">
                        <input type="text" name="student_id" value="{{ $user_info->student_profile->student_id }}" placeholder="Student ID">
                    </span>
                  </div>
                  <div class="text-lg leading-normal mt-0 mb-2 text-black font-bold">
                    <i class="material-icons align-top text-gray-800">library_books</i>
                    Resume: 
                    @if (file_exists(('resume/'.$user_info->student_profile->student_resume) ))
                    <a class="underline" href="{{ asset('resume/'.$user_info->student_profile->student_resume) }}" target="_blank">View Current Resume</a>
                    @else
                    Not Upload Resume Yet
                    @endif
                  </div>
                  <div class="text-lg text-center text-black underline font-bold">
                  <input type="file" name="resume" id='resume' class='hidden'/>
                  <label for="resume" id='resume_text'>Click me to upload resume</label>
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
                        <textarea type="text" name="aboutMe" placeholder="About Me" rows="5" cols="50" class="text-sm font-medium text-gray-900 dark:text-white">{{ $user_info->student_profile->student_aboutMe }}</textarea>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="text-center mb-10">
                    <a href="{{url()->previous()}}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        </section>
      </main>

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

<script>
document.getElementById('resume').onchange = function(){
    if (!this.value == ""){
        let text = this.value;
        text = text.replace(/.*[\/\\]/, '');
        document.getElementById('resume_text').textContent = text;
    }else{
        document.getElementById('resume_text').textContent = "Click me to upload resume";
    }
}

</script>