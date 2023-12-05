<x-layout>
    <h1 class="text-3xl font-bold">Applicants for <span class="text-accent">{{ $job->title }}</span></h1>
    <div class="flex flex-col gap-5">
        @foreach ($jobApplications as $application)
            <div class="card bg-base-200">
                <div class="card-body">
                    <div class="flex gap-5">
                        <div class="w-24">
                            @if ($application->user->profile_img_path)
                                <div class="avatar">
                                    <div class="w-24 rounded-full">
                                        <img src="{{ asset($application->user->profile_img_path) }}" />
                                    </div>
                                </div>
                            @else
                                <div class="avatar placeholder">
                                    <div class="bg-neutral text-neutral-content rounded-full w-24">
                                        <span class="text-4xl">{{ $application->user->initials() }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $application->user->first_name . ' ' . $application->user->last_name }}</h2>
                            @php($highlightedEdu = $application->user->higlightedEducation())
                            @if ($highlightedEdu)
                                <h3 class="font-semibold"> {{ $highlightedEdu->title }}
                                    ({{ $highlightedEdu->start_date->format('d. m. Y') . ' - ' . ($highlightedEdu->end_date ? $highlightedEdu->end_date->format('d. m. Y') : 'now') }})
                                </h3>
                            @endif

                            @php($highlightedWork = $application->user->higlightedWork())
                            @if ($highlightedWork)
                                <h3 class="font-semibold"> {{ $highlightedWork->title }}
                                    ({{ $highlightedWork->start_date->format('d. m. Y') . ' - ' . ($highlightedWork->end_date ? $highlightedWork->end_date->format('d. m. Y') : 'now') }})
                                </h3>
                            @endif
                        </div>
                    </div>
                    <div class="card-actions justify-end">
                        <a class="btn btn-accent" href="/dashboard/application/{{ $application->id }}">Open</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
