<x-layout>
    <div class="card  p-6 max-w-2xl mx-auto mt-20">
        <div class="card-body ">
            <h1 class="card-title text-4xl justify-center font-extrabold">Congrats!</h1>
            <h2 class="text-3xl mb-10 justify-center">You successfully applied to <a
                    class="font-extrabold text-secondary hover:underline"
                    href="/job/{{ $job['id'] }}">{{ $job['title'] }}</a>!
            </h2>
            <div class="card-actions justify-center">
                <button class="btn btn-primary btn-lg ">Go to my applications</button>

            </div>

        </div>
    </div>
</x-layout>
