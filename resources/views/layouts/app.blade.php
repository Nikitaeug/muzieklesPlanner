<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Lessons</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            margin: 0; /* Ensure no default margin on the body */
        }
        ::-webkit-scrollbar {
            width: 12px;
        }
        ::-webkit-scrollbar-thumb {
            background: #2cb1da; 
            border-radius: 6px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #2fa1c4;
        }
    </style>
</head>
<body>
    @include('components.notification')
        @auth
            <div class="flex min-h-screen bg-gray-100">
                @include('layouts.ingelogdnav')
                <div class="flex-1">
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="relative px-4 py-6 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <main class="p-4">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        @else
            <div class="min-h-screen">
                @include('layouts.navigation')
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="px-4 mx-auto y-6 sm:px-6 lg:px-8">
                            <div class="bg-no-repeat bg-cover" style="background-image: url('/muziekles.png');">
                                {{ $header }}
                            </div>
                        </div>
                    </header>
                @endisset

                <main class="p-4">
                    {{ $slot }}
                </main>
            </div>
        @endauth
    </div>
</body>
</html>
