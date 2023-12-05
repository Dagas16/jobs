<html>

<head>
    <title>{{ $title ?? 'Job Listings' }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="navbar bg-base-200 mb-6">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl font-extrabold" href="/">JOB <span
                    class="text-primary">LISTINGS</span></a>
        </div>
        <nav class="flex-none">
            <ul class="menu menu-horizontal px-1">
                @auth
                    <li>
                        Velkommen, {{ auth()->user()->first_name }}
                    </li>
                @else
                    <li>
                        <a href="/login">Login</a>
                    </li>

                @endauth
            </ul>

            @auth
                <div class="dropdown dropdown-end">

                    <div tabindex="0" role="button"
                        class="btn btn-ghost btn-circle avatar ml-2 @if (!auth()->user()->profile_img_path) placeholder bg-accent @endif">
                        <div class="w-10 rounded-full">
                            @if (auth()->user()->profile_img_path)
                                <img src="{{ asset(auth()->user()->profile_img_path) }}" />
                            @else
                                <span class="uppercase text-xl text-accent-content">{{ auth()->user()->initials() }}</span>
                            @endif
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between" href="/profile">
                                Profile
                            </a>
                        </li>
                        @isrecruiter
                            <li>
                                <a class="justify-between" href="/dashboard">
                                    Dashboard
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="justify-between" href="/my-applications">
                                    My Applications
                                </a>
                            </li>
                            <li>
                                <a class="justify-between" href="/create-company">
                                    Create company
                                </a>
                            </li>
                        @endisrecruiter
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button>Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

        </nav>



    </header>
    <main class="container mx-auto">
        {{ $slot }}
    </main>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
