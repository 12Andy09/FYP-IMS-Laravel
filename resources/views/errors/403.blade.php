<!DOCTYPE html>
<html>
<head>
<title>403 Error Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style type="text/css">
      .text-9xl{
      font-size: 14rem;
      }
      @media(max-width: 645px){
      .text-9xl{
      font-size: 5.75rem;
      }
      .text-6xl{
      font-size: 1.75rem;
      }
      .text-2xl {
      font-size: 1rem;
      line-height: 1.2rem;
      }
      .py-8 {
      padding-top: 1rem;
      padding-bottom: 1rem;
      }
      .px-6 {
      padding-left: 1.2rem;
      padding-right: 1.2rem;
      }
      .mr-6{
      margin-right: 0.5rem;
      }
      .px-12 {
      padding-left: 1rem;
      padding-right: 1rem;
      }
      }
    </style>
</head>
<body>
<div class="bg-gradient-to-r from-purple-300 to-blue-200">
<div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
<div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
<div class="border-t border-gray-200 text-center pt-8">
<h1 class="text-9xl font-bold text-purple-400">403</h1>
<h1 class="text-6xl font-medium py-8 mx-5">Access to this page is restricted</h1>
<button>
    <a href="{{url()->previous()}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Return Previous Page</a>
</button>
</div>
</div>
</div>
</div>
</body>
</html>