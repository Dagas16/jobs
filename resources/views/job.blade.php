<x-layout>
    <div class="flex">
        <div class="grow">
            <h1 class="text-3xl font-extrabold">{{ $job['title'] }}</h1>
            <div>
                {{ $job['description'] }}
            </div>
        </div>
        <div class="card card-compact bg-base-200 shadow-xl">
            <figure class="px-5 pt-5">
                <img src="https://placehold.co/300x100" class="rounded-xl" />
            </figure>
            <div class="card-body item-center text-center">
                <h2 class="text-xl text-bold">{{ $job['companyName'] }}</h2>
            </div>
        </div>
    </div>
</x-layout>
