<x-layout>
    <div class="grid gird-cols-1 lg:grid-cols-2 gap-4">
        @foreach ($jobs as $job)
            <a href="/job/{{ $job['id'] }}">
                <div class="card bg-base-200 hover:-translate-y-1 transition-all hover:shadow-md cursor-pointer h-full">
                    <div class="card-body flex flex-col">
                        <div class="grid grid-cols-2 h-18">
                            <div>
                                <h2 class="card-title font-extrabold">{{ $job['title'] }}</h2>
                                <h3>{{ $job->company->name }}</h3>

                            </div>
                            <div class="flex justify-end">
                                @if ($job->company->logo_path)
                                    <img class="max-w-[150px] max-h-[80px] object-contain"
                                        src="{{ asset($job->company->logo_path) }}" />
                                @endif
                            </div>
                        </div>

                        <div class="mb-5 grow">
                            {{ $job->short_description }}
                        </div>
                        <div class="card-actions justify-end">
                            @issearcher
                                <button class="btn btn-primary btn-sm">Apply</button>
                            @endissearcher
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</x-layout>
