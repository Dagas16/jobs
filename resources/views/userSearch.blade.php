<x-layout>
    <h1 class="text-4xl font-bold mb-5">
        User search
    </h1>
    <div class="card bg-base-200 mb-5">
        <div class="card-body">
            <h2 class="card-title">
                Filters
            </h2>
            <div class="flex gap-2">
                @foreach ($allTags as $skill)
                    <div class="rounded-full py-1 px-3 font-semibold bg-primary text-primary-content tag-search"
                        data-tag-id="{{ $skill->id }}">
                        <span>
                            {{ $skill->value }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="flex flex-col gap-5">
        @foreach ($users as $user)
            <div class="card bg-base-200">
                <div class="card-body">
                    <div class="flex gap-5">
                        <div class="w-24">
                            @if ($user->profile_img_path)
                                <div class="avatar">
                                    <div class="w-24 rounded-full">
                                        <img src="{{ asset($user->profile_img_path) }}" />
                                    </div>
                                </div>
                            @else
                                <div class="avatar placeholder">
                                    <div class="bg-neutral text-neutral-content rounded-full w-24">
                                        <span class="text-4xl">{{ $user->initials() }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">
                                {{ $user->first_name . ' ' . $user->last_name }}</h2>
                            @php($highlightedEdu = $user->higlightedEducation())
                            @if ($highlightedEdu)
                                <h3 class="font-semibold"> {{ $highlightedEdu->title }}
                                    ({{ $highlightedEdu->start_date->format('d. m. Y') . ' - ' . ($highlightedEdu->end_date ? $highlightedEdu->end_date->format('d. m. Y') : 'now') }})
                                </h3>
                            @endif

                            @php($highlightedWork = $user->higlightedWork())
                            @if ($highlightedWork)
                                <h3 class="font-semibold"> {{ $highlightedWork->title }}
                                    ({{ $highlightedWork->start_date->format('d. m. Y') . ' - ' . ($highlightedWork->end_date ? $highlightedWork->end_date->format('d. m. Y') : 'now') }})
                                </h3>
                            @endif


                            <div class="flex gap-2 mt-3">
                                @foreach ($user->tags as $skill)
                                    <div class="rounded-full py-1 px-3 font-semibold bg-primary text-primary-content">
                                        <span>
                                            {{ $skill->tag->value }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
</x-layout>
