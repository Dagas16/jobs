<x-layout>
    <div class="flex mb-10">
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
    <div class="card bg-base-200 shadow-xl p-6">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold mb-3">
                Your application
            </h2>
            <form action="/job/send-application/{{ $job['id'] }}" method="POST">
                @csrf
                <div class="mb-5">
                    <textarea class="textarea textarea-bordered w-full" name="cover_letter" rows="10"></textarea>

                </div>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>

        </div>

    </div>
</x-layout>
