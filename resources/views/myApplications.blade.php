<x-layout>
    <h1 class="font-bold text-4xl mb-10">My Applications</h1>
    <div class="flex flex-col gap-10">
        @foreach ($applications as $application)
            <div class="card bg-base-200">
                <div class="card-body ">
                    <h2 class="card-title text-3xl font-bold">Position: <span
                            class="text-secondary">{{ $application['job']['title'] }}</span></h2>
                    <p class="mb-10">{{ $application['job']['description'] }}</p>
                    <div class=" border-primary border-4 p-4 rounded-3xl">
                        <p class="whitespace-pre-wrap">{{ $application['cover_letter'] }}</p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    </div>
    </div>
</x-layout>
