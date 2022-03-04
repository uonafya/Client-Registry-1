<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Client Registry</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @livewireStyles
    <style>
        body{
            background-color: whitesmoke;
        }
        button{
            margin-left: 11%;
        }
    </style>
</head>
<body class="">
<div class="font-sans text-gray-900 antialiased">
    <div class="flex flex-col sm:justify-center items-center pt-5 pb-5">
        <h2 class="font-bold text-2xl">Client Registry</h2>
        <button type="button" class="place-self-start pl-20  hover:absolute"><b>Create New</b></button>
        @livewire('landing')
        {{-- <div class="w-full sm:max-w-6xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            
        </div> --}}
    </div>
</div>
@livewireScripts

</body> 
</html>