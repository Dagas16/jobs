<x-layout>
    <div class="flex flex-col gap-5">
        <h1 class="text-4xl font-bold">Dashboard</h1>
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="card-title text-3xl font-bold text-secondary">{{ $company['name'] }}</div>
                <div class="mb-4">
                    <p>Welcome to the dashboard</p>
                </div>
                <div class="card-actionst">
                    <a class="btn btn-secondary" href="/create-job">Create Job</a>
                </div>
                {{-- <div class="">{{ date_format(new DateTime($listing['deadline']), 'd/m/Y') }}</div> --}}
            </div>
        </div>

        <h2 class="mt-5 text-3xl font-bold">Your listings</h2>
        @foreach ($company['listings'] as $listing)
            <div class="card bg-base-200">
                <div class="card-body">
                    <div class="card-title text-2xl font-bold text-primary">{{ $listing['title'] }}</div>
                    <div class="">
                        Deadline:
                        <span
                            class="font-bold text-secondary">{{ date_format(new DateTime($listing['deadline']), 'd/m/Y') }}</span>
                    </div>
                    <div>Number of applicants: <span class="font-bold text-secondary">5</span></div>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>
