<x-layout>
    <div class="justify-center flex">
        <h1 class="font-bold">My Applications</h1>
        <ul class="">
            @foreach ($applications as $application)
                <li>{{ $application['cover_letter'] }}</li>
            @endforeach
        </ul>
    </div>
</x-layout>
