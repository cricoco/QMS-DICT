<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>DICT QMS Portal - Login</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ url('css/user-auth.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/DICT_Standard_Sub-brand_Logo.png/640px-DICT_Standard_Sub-brand_Logo.png" style="width: auto; height: 200px; ">
        </div>
        <div class="w-full sm:max-w-md mt-1 px-3 py-4 text-center" style="font-family: helvetica, sans-serif; font-size: 22px; color: #235596">
            
            <div class="typewriter poppins-thin" ><h3><strong>Regional Office IX and BASULTA</strong></h3></div>
            <div class="typewriter poppins-regular"><h1>QUALITY MANAGEMENT SYSTEM <br>PORTAL</h1></div>
            <div class="typewriter poppins-thin" ><h4><strong>v.01</strong></h4></div>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <br><br>
</body>

</html>