<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Glass Effect Styles -->
        <style>
            .glass-container {
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            }
            
            .glass-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
                border-radius: inherit;
                pointer-events: none;
            }
            
            /* Enhanced text readability */
            .glass-container input {
                background: rgba(255, 255, 255, 0.2) !important;
                border: 1px solid rgba(255, 255, 255, 0.3) !important;
                color: white !important;
            }
            
            .glass-container input::placeholder {
                color: rgba(255, 255, 255, 0.7) !important;
            }
            
            .glass-container label {
                color: white !important;
                font-weight: 600 !important;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            }
            
            .glass-container a {
                color: #93c5fd !important;
                font-weight: 600 !important;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            }
            
            .glass-container a:hover {
                color: #dbeafe !important;
            }
            
            .glass-container button {
                background: rgba(59, 130, 246, 0.9) !important;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2) !important;
                color: white !important;
            }
            
            .glass-container button:hover {
                background: rgba(29, 78, 216, 0.9) !important;
            }
            
            .glass-container .text-sm {
                color: rgba(255, 255, 255, 0.9) !important;
                font-weight: 500 !important;
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            }
            
            .glass-container input:focus {
                background: rgba(255, 255, 255, 0.3) !important;
                border-color: rgba(147, 197, 253, 0.8) !important;
                box-shadow: 0 0 0 3px rgba(147, 197, 253, 0.2) !important;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('img/Pic01.jpg') }}');">
            <!-- Background overlay for better readability -->
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 glass-container overflow-hidden sm:rounded-2xl relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>