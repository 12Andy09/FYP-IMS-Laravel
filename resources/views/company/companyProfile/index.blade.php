@section('title', 'View Profile')
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Company Profile
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <div class="p-6 w-2/6 flex justify-center opacity-75">
                        <img src="{{ asset('profile/default_profile.png') }}" alt="Profile Photo" class="h-auto align-middle border-none max-w-150-px bg-white">
                    </div>
                    <div class="p-6 w-4/6 flex justify-center items-center text-4xl text-transform: capitalize">
                        {{ $user_info->name }}
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 shadow-md">
                    <p class="font-bold text-2xl text-center">Company Overview</p>
                    <div class="py-5 border-b-4">
                        <p class="font-semibold text-xl my-3">About Us</p>
                        <p class="whitespace-pre-line">{{ $user_info->company_profile->company_overview }}</p>
                    </div>
                    <div class="py-5 border-b-4">
                        <p class="font-semibold text-xl my-3">Why Join Us</p>
                        <p class="whitespace-pre-line">{{ $user_info->company_profile->company_whyJoin }}</p>
                    </div>
                    <div class="py-5 border-b-4">
                        <p class="font-semibold text-xl my-3">Company Address</p>
                        <p class="whitespace-pre-line">{{ $user_info->company_profile->company_address }}</p>
                    </div>
                    <div class="py-5">
                    <p class="font-semibold text-xl my-3">Company Email</p>
                    <p class="whitespace-pre-line">{{ $user_info->email }}</p>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="font-bold text-2xl text-center">Company Location</p>
                    <div class="container mt-5">
                        <div id="map"></div>
                    </div>
                    <p class="text-gray-400 text-center">Go to edit to update your map location</p>





                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                    <style type="text/css">
                        #map {
                          height: 400px;
                        }
                    </style>
                    <script type="text/javascript">
                        function initMap() {
                          const myLatLng = { lat: {{ $user_info->company_profile->address_lat }}, lng: {{ $user_info->company_profile->address_lon }} };
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
                <div class="text-center my-10">
                    @if (Auth::id() == $user_info->id)
                  <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('company_profile.edit',$user_info->id) }}">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>