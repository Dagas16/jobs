<x-layout>
    <h1 class="text-3xl font-bold">Applicants for <span class="text-accent">{{ $job->title }}</span></h1>
    <div class="flex flex-col gap-5">
        @foreach ($jobApplications as $application)
            <div class="card bg-base-200">
                <div class="card-body">
                    <div class="flex">
                        <div class="w-[100px]">
                            <img src="{{ asset($application->user->profile_img_path) }}"
                                class="max-w-[100px] max-h-[100px] rounded-lg" />
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
                    {{-- <div class="hidden flex-col gap-8">
                        @php($experiences = $application->user->experiencesTypeGroups())
                        @foreach ($experiences as $index => $val)
                            @if (count($experiences[$index]) > 0)
                                <div>
                                    <h3 class="text-4xl font-extrabold text-secondary grow -mb-1.5 text-right mr-4">
                                        {{ $index }}
                                    </h3>

                                    <div class="border-4 border-secondary p-4 card">
                                        @foreach ($experiences[$index] as $exp)
                                            <div>
                                                <div class="flex">
                                                    <h3 class="text-2xl font-bold grow">{{ $exp['title'] }}</h3>
                                                    <div class="text-2xl font-bold">{{ $exp['start_date'] }} -
                                                        {{ $exp['end_date'] ?? 'now' }}</div>
                                                </div>
                                                <h4 class="text-lg italic mb-3">{{ $exp['institution'] }}</h4>
                                                <p class="text-lg">{{ $exp['description'] }}</p>
                                            </div>
                                            @if (!$loop->last)
                                                <div class="divider"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div> --}}

                </div>
            </div>
        @endforeach
    </div>
</x-layout>
