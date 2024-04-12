<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crossword Puzzle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>const assetPath = '{{ asset('') }}';</script>
    @vite('resources/js/app.js')
    @vite('resources/js/main.js')
    @vite('resources/css/app.css')
</head>
<body class="h-full">

<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="{{ asset('img/logo.jpg') }}"
                        alt="Logo">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                               aria-current="page">Crossword</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Scoreboard</a>
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                       aria-current="page">Crossword</a>
                    <a href="#"
                       class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Scoreboard</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div id="overlay"></div>

        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div id="container" class="container mx-auto py-8">
                <div id='startButtonDiv'
                     class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col items-center justify-center"
                     style="width: 100%; height: 80vh;">
                    <button type="button" id="startButton"
                            class="mt-4 px-3 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                        Start
                    </button>
                </div>

                <div id="content" class="bg-black shadow-md rounded"
                     style="width: 100%; height: 80vh; display: none"></div>


                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div class="flex items-center mx-auto">
                        <!-- Tutaj pole do wpisania hasła -->
                        <div id="solution" class="flex items-center">

                        </div>
                        <!-- Koniec pola do wpisania hasła -->
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Przyciski Reset i Check -->
                        <button type="button" id="resetButton" class="text-sm font-semibold leading-6 text-gray-900">
                            Reset
                        </button>
                        <button type="submit" id="checkButton"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Check
                        </button>
                    </div>
                </div>


            </div>

        </div>

    </main>
</div>
</body>
</html>



