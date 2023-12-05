<x-layout>
    <div class="flex mb-10">
        <div class="grow">
            <h1 class="text-3xl font-extrabold">{{ $job['title'] }}</h1>
            <div class="whitespace-pre-wrap">{{ $job['description'] }}</div>
        </div>
        <div class="card card-compact bg-base-200 shadow-xl w-96">
            <figure class="px-5 pt-5">
                <img src="{{ asset($job['company_logo_path']) }}" class="rounded-xl max-w-[300px] max-h-[100px]" />
            </figure>
            <div class="card-body item-center text-center">
                <h2 class="text-xl text-bold">{{ $job['company_name'] }}</h2>
            </div>
        </div>
    </div>

    <div class="card bg-base-200 shadow-xl p-6">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold">
                Your application
            </h2>
            <h3 class="text-xl mb-5 italic">Your CV will be attached to your application</h3>
            @if ($userApplication)
                <div class="whitespace-pre-wrap">{{ $userApplication->cover_letter }}</div>
            @else
                <form action="/job/send-application/{{ $job['id'] }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <textarea class="textarea textarea-bordered w-full" name="cover_letter" rows="10"></textarea>
                    </div>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            @endif

        </div>

    </div>
</x-layout>
