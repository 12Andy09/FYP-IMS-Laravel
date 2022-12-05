@section('title', 'Edit Profile')
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Company Profile
        </h2>
    </x-slot>
    <form action="{{ route('company_profile.update',$user_info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf  

        @method('PUT')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="p-6 w-2/6 flex justify-center shadow-md">
                        <img src="{{ asset('profile/'.$user_info->company_profile->company_photo) }}" id="profile_photo" alt="Profile Photo" class="h-auto align-middle border-none max-w-150-px bg-white">
                        <input type="file" id="profile" name="profile" class="hidden" onchange="document.getElementById('profile_photo').src = window.URL.createObjectURL(this.files[0])"/>
                        <label for="profile" class="cursor-pointer">Click me to upload profile</label>
                        <x-input-error :messages="$errors->get('profile')" class="mt-2" />
                    </div>
                    <div class="p-6 w-4/6 flex justify-center items-center text-4xl text-transform: capitalize shadow-md space-x-3">
                        <strong class="text-md">Name:</strong>
                        <input type="text" name="name" value="{{ $user_info->name }}" placeholder="Name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 shadow-md">
                    <p class="font-bold text-2xl text-center">Company Overview</p>
                    <div class="py-5">
                        <p class="font-semibold text-xl">About Us</p>
                        <textarea id="company_overview" name="company_overview" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tell us about your company...">{{ $user_info->company_profile->company_overview }}</textarea>
                        <x-input-error :messages="$errors->get('company_overview')" class="mt-2" />
                    </div>
                    <div class="py-5">
                        <p class="font-semibold text-xl">Why Join Us</p>
                        <textarea id="company_whyJoin" name="company_whyJoin" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Why should we join u...">{{ $user_info->company_profile->company_whyJoin }}</textarea>
                        <x-input-error :messages="$errors->get('company_whyJoin')" class="mt-2" />
                    </div>
                    <div class="py-5">
                        <p class="font-semibold text-xl">Company Address</p>
                        <textarea id="company_address" name="company_address" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Why should we join u...">{{ $user_info->company_profile->company_address }}</textarea>
                        <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                    </div>
                    <div class="py-5">
                        <p class="font-semibold text-xl">Company Email</p>
                        <input type="email" id="email" name="email" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Why should we join u..." value="{{ $user_info->email }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="font-bold text-2xl text-center">Company Location</p>
                    <p class="text-gray-400">How to find your location's latitude and longtitude</p>
                    <ul class="list-disc list-inside text-gray-400">
                        <li>Left click the Google icon on the Google Map</li>
                        <li>Search Your address</li>
                        <li>Right Click on the map to view the latitude and longtitude of selected address</li>
                    </ul>

                    <div class="my-8 space-x-5">
                        <strong class="text-md">Your Company Location: Latitude, Longtitude</strong>
                        <input type="text" name="address_latitude" placeholder="Latitude" value="{{ $user_info->company_profile->address_lat }}">
                        <input type="text" name="address_longtitude" placeholder="Longtidue" value="{{ $user_info->company_profile->address_lon }}">
                        <x-input-error :messages="$errors->get('address_latitude')" class="mt-2" />
                        <x-input-error :messages="$errors->get('address_longtitude')" class="mt-2" />
                        </div>

                    <div class="container mt-5">
                        <div id="map"></div>
                    </div>





                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                    <style type="text/css">
                        #map {
                          height: 400px;
                        }
                    </style>
                    <script type="text/javascript">
                        function initMap() {
                            let lat_value = {{ $user_info->company_profile->address_lat }};
                            let lon_value = {{ $user_info->company_profile->address_lon }};
                            if ( (lat_value == 0.000000) || (lon_value == 0.000000) ){
                                lat_value = 1.532302;
                                lon_value = 110.357173;
                            }
                          const myLatLng = { lat: lat_value, lng: lon_value };
                          const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 5,
                            center: myLatLng,
                          });
                  
                          const marker = new google.maps.Marker({
                            position: myLatLng,
                            map,
                          });
                          map.setZoom(17);
                        map.setCenter(marker.getPosition());
                        }

                        window.initMap = initMap;
                    </script>
                  
                    <script type="text/javascript"
                        src="https://maps.google.com/maps/api/js?key={{ "AIzaSyDdWoO2911PZx7ZI-tMriVlrHkT0Uq3mNc" }}&callback=initMap" ></script>

                </div>
                <div class="text-center my-10 space-x-5">
                    <a href="{{url()->previous()}}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</x-app-layout>
