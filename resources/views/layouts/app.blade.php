<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .hover-bg-gold:hover {
            background-color: gold !important;
            color: black !important;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
        }

        /* Sidebar */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0; /* لو عايزها يمين غيرها لـ right:0 */
            height: 100vh;
            width: 250px;
            background: #000;   /* أسود */
            color: #FFD700;     /* ذهبي */
            transition: all 0.3s;
            padding-top: 60px; /* علشان ما يغطيش النافبار */
            z-index: 1000; /* يخليها فوق المحتوى */
        }

        #sidebar .nav-link {
            color: #FFD700;
            border-radius: 8px;
            transition: 0.3s;
        }

        #sidebar .nav-link:hover,
        #sidebar .nav-link.active {
            background: #FFD700;
            color: #000;
        }

        /* Content */
        #content {
            margin-left: 250px; /* يبعد المحتوى عن الـ sidebar */
            padding: 20px;
            transition: all 0.3s;
        }

        /* موبايل */
        @media (max-width: 768px) {
            #sidebar {
                left: -250px;
            }
            #sidebar.active {
                left: 0;
            }
            #content {
                margin-left: 0;
            }
        }

    </style>
</head>
<body class="bg-dark">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        const toggleBtn = document.getElementById("toggleBtn");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("active");
        });
    </script>
</body>
</html>
