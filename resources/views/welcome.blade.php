<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img class="logo"
                 srcset="data:image/png;base64,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"
                 alt="infyom logo " width="110px" height="51px">
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a href="https://infyom.com/open-source/laravelgenerator/docs/8.0/introduction"
                               class="underline text-gray-900 dark:text-white">
                                Documentation
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a href="https://github.com/InfyOmLabs/adminlte-generator" class="underline text-gray-900 dark:text-white">
                                Github
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a href="https://www.youtube.com/channel/UCuCjzuwBqMqFdh0EU-UwQ-w?sub_confirmation=1" class="underline text-gray-900 dark:text-white">
                               Tutorials
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                            <a href="https://infyom.com/blog" class="underline text-gray-900 dark:text-white">
                                Blogs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                         stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>

                    <a href="https://codecanyon.net/user/infyomlabs" class="ml-1 underline">
                        Shop
                    </a>

                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                        <path
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>

                    <a href="https://opencollective.com/infyomlabs" class="ml-1 underline">
                        Sponsor
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</div>
</body>
</html>
