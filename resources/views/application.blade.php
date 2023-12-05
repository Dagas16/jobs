<x-layout>
    <div class="flex flex-col gap-5 mb-20">
        <h1 class="text-4xl font-bold">Application for <span class="text-accent">{{ $application->job->title }}</span>
        </h1>
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="flex gap-16">
                    @php($applicant = $application->user)
                    <div>
                        @if ($application->user->profile_img_path)
                            <div class="avatar">
                                <div class="w-36 rounded-full">
                                    <img src="{{ asset($application->user->profile_img_path) }}" />
                                </div>
                            </div>
                        @else
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-36">
                                    <span class="text-6xl">{{ $application->user->initials() }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="flex flex-col gap-1">
                            <h2
                                class="text-4xl font-bold bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                                {{ $applicant->first_name . ' ' . $applicant->last_name }}
                            </h2>
                            <p class="text-2xl font-semibold">{{ $applicant->email }}</p>
                            <p class="text-2xl font-semibold">{{ $applicant->phone }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card bg-base-200">
            <div class="card-body">
                <h2 class="card-title text-3xl font-bold">Curriculum Vitae</h2>
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
            </div>
        </div>

        <div class="card bg-base-200">
            <div class="card-body">
                <h2 class="card-title text-3xl font-bold">Cover letter</h2>
                <div>
                    {{ $application->cover_letter }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
