<x-layout>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($jobs as $job)
            <a href="/job/{{ $job['id'] }}">
                <div class="card bg-base-200 hover:-translate-y-1 transition-all hover:shadow-md cursor-pointer">
                    <div class="card-body">
                        <h2 class="card-title font-extrabold">{{ $job['title'] }}</h2>
                        <h3>{{ $job['companyName'] }}</h3>
                        <p>
                            {{ $job['description'] }}
                        </p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-sm group-hover:bg-accent">Apply</button>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</x-layout>
