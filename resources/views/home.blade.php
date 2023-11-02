<x-layout>
    <h1 class="text-3xl font-bold mb-10">New Jobs</h1>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($jobs as $job)
            <div class="card bg-base-200">
                <div class="card-body">
                    <h2 class="card-title">{{ $job['title'] }}</h2>
                    <h3>{{ $job['companyName'] }}</h3>
                    <p>
                        {{ $job['description'] }}
                    </p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary btn-sm">Apply</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
