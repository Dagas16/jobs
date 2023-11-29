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
                <li><a href="/create-job">Create Job</a></li>
                @guest
                    <li>
                        <a href="/login">Login</a>
                    </li>
                @endguest
            </ul>

            @auth
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar placeholder bg-secondary">
                        <div class="w-10 rounded-full">
                            <span>DS</span>
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-between" href="/my-applications">
                                My Applications
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
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
</body>

</html>
