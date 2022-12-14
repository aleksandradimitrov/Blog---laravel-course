<!doctype html>
<html>

<head>
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

</head>

<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="190" height="16">
                </a>
            </div>

            <div id="up" class="mt-8 md:mt-0 flex items-center">
                <a href="/" class="text-xs font-bold uppercase">Home</a>

                @auth
                    <span class="bg-purple-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Welcome, {{ auth()->user()->name }}!
                    </span>
                    <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-3">
                        @csrf

                        <button type="submit"
                            class="rounded-full bg-indigo-400 py-3 px-5 text-xs font-semibold text-white uppercase">Log
                            out</button>
                    </form>
                @else
                    <a href="/register"
                        class="bg-purple-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Register
                    </a>
                    <a href="/login"
                        class="bg-purple-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        LogIn
                    </a>
                @endauth
                <a href="#newsletter"
                    class="bg-indigo-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Subscribe
                    for updates</a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>
            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    @if (session()->has('errors'))
                        {{ session('errors') }}
                        {{-- <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                        <p>{{ session('message') }}</p>
                    </div> --}}
                    @endif
                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" name="email" type="email" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none"
                                    value="{{ old('email') }}">

                                @error('body')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-purple-500 hover:bg-purple-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
                <a href="#up"
                    class="reset disp-block m-h-10 m-v-15 false ml-4 rounded-full transition-colors duration-300 bg-purple-300 hover:bg-purple-600 border border-gray-400 text-white py-3 px-5 text-xs uppercase">Go
                    Up</a>

            </div>
        </footer>
    </section>
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif

</body>

</html>
