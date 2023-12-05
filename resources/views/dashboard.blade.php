<x-layout>
    <div class="flex flex-col gap-5">
        <h1 class="text-4xl font-bold">Dashboard</h1>
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="card-title text-3xl font-bold text-secondary">{{ $company->name }}</div>
                <div>
                    <img src="{{ asset($company->logo_path) }}" alt="logo" class="max-w-[300px] max-h-[100px]" />
                </div>
                <div class="mb-4">
                    <p>Welcome to the dashboard</p>
                </div>
                <div class="card-actions">
                    <a class="btn btn-secondary">Edit company</a>
                </div>
            </div>
        </div>

        <div class="flex items-center mt-3">
            <h2 class="text-3xl font-bold grow">Your listings</h2>
            <a class="btn btn-secondary" href="/create-job">Create Job</a>
        </div>
        @foreach ($company->listings as $listing)
            <div class="card bg-base-200">
                <div class="card-body">
                    <div class="card-title text-2xl font-bold text-primary">{{ $listing->title }}</div>
                    <div class="">
                        Deadline:
                        <span
                            class="font-bold text-secondary">{{ date_format(new DateTime($listing->deadline), 'd/m/Y') }}</span>
                    </div>

                    <div>
                        Number of applicants:
                        <span class="font-bold text-secondary">{{ count($listing->applications) }}</span>
                    </div>

                    <div class="card-actions">
                        <a class="btn btn-sm btn-secondary"
                            href="/dashboard/job/{{ $listing->id }}/applications">Applications</a>
                        <a class="btn btn-sm btn-secondary" href="/dashboard/job/{{ $listing->id }}/edit">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-layout>
