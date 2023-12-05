<x-layout>
    <div class="flex flex-col gap-10">
        <div class="card bg-base-200">
            <div class="card-body">
                <h2 class="card-title text-4xl font-bold text-primary">Personalia</h2>

                <form action="/update-user" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    <div class="flex gap-10">
                        <div class="flex flex-col">
                            <div class="grow mt-5 flex justify-center">
                                @if ($personalia->profile_img_path)
                                    <img src="{{ asset($personalia->profile_img_path) }}"
                                        class="rounded-3xl object-contain h-72" />
                                @else
                                    <div class="flex items-center">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral text-neutral-content rounded-full w-48">
                                                <span class="text-5xl">{{ $personalia->initials() }}</span>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div>
                            <div class="form-control">
                                <input type="file" name="profile_img_path" class="file-input file-input-bordered" />
                                <div class="label">
                                    @if ($errors->has('profile_img_path'))
                                        <span
                                            class="label-text-alt text-error">{{ $errors->first('profile_img_path') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">First name(s)</span>
                                </label>
                                <input type="text" name="first_name"
                                    class="input input-bordered @if ($errors->has('first_name')) input-error @endif"
                                    value="{{ $personalia->first_name }}">
                                <div class="label">
                                    @if ($errors->has('first_name'))
                                        <span
                                            class="label-text-alt text-error">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Last name</span>
                                </label>
                                <input type="text" name="last_name" value="{{ $personalia->last_name }}"
                                    class="input input-bordered @if ($errors->has('last_name')) input-error @endif">
                                <div class="label">
                                    @if ($errors->has('last_name'))
                                        <span class="label-text-alt text-error">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input type="text" name="email" value="{{ $personalia->email }}"
                                    class="input input-bordered @if ($errors->has('email')) input-error @endif">
                                <div class="label">
                                    @if ($errors->has('email'))
                                        <span class="label-text-alt text-error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Phone</span>
                                </label>
                                <input type="text" name="phone" value="{{ $personalia->phone }}"
                                    class="input input-bordered @if ($errors->has('phone')) input-error @endif">
                                <div class="label">
                                    @if ($errors->has('phone'))
                                        <span class="label-text-alt text-error">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-actions mt-4 justify-end">
                        <button type="submit" class="btn btn-accent">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @issearcher
            <div class="card bg-base-200">
                <div class="card-body flex flex-col gap-5">
                    <div class="flex">
                        <h2 class="card-title text-4xl font-bold text-primary grow">Curriculum Vitae</h2>
                        <button id="add-experience-btn" class="btn btn-primary">Add new</button>
                    </div>

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
                                                <h3 class="text-2xl font-bold grow">{{ $exp->title }}</h3>
                                                <div class="text-2xl font-bold">{{ $exp->start_date }} -
                                                    {{ $exp->end_date ?? 'now' }}</div>
                                            </div>
                                            <h4 class="text-lg italic mb-3">{{ $exp->institution }}</h4>
                                            <p class="text-lg">{{ $exp->institution }}</p>
                                            <div class="card-actions mt-4 justify-end">
                                                <a href="/update-experience/{{ $exp->id }}"
                                                    class="btn btn-lg btn-accent">Update</a>
                                                <form action="/delete-experience/{{ $exp->id }}" method="post">
                                                    @csrf

                                                    <button type="submit" class="btn btn-sm btn-error"
                                                        onclick="return confirm('Confirm deletion of entry.')">Delete
                                                    </button>
                                                </form>

                                            </div>

                                        </div>
                                        @if (!$loop->last)
                                            <div class="divider"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <form id="cv-form" action="/create-experience" method="post"
                        class="{{ $experiencesCount == 0 || $errors->any() ? 'flex' : 'hidden' }} flex-col gap-1">
                        @csrf
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Title</span>
                            </label>
                            <input type="text" name="title"
                                class="input input-bordered @if ($errors->has('title')) input-error @endif">
                            <div class="label">
                                @if ($errors->has('title'))
                                    <span class="label-text-alt text-error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Institution</span>
                                    </label>
                                    <input type="text" name="institution"
                                        class="input input-bordered @if ($errors->has('institution')) input-error @endif">
                                    <div class="label">
                                        @if ($errors->has('institution'))
                                            <span
                                                class="label-text-alt text-error">{{ $errors->first('institution') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-control">
                                    <label for="type" class="label">
                                        <span class="label-text">Type</span>
                                    </label>
                                    <select name="type"
                                        class="select select-bordered @if ($errors->has('type')) select-error @endif">
                                        <option value="" class="hidden"><i>Select</i></option>
                                        <option value="work">Work</option>
                                        <option value="education">Education</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="label">
                                        @if ($errors->has('type'))
                                            <span class="label-text-alt text-error">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Start Date</span>
                                        </label>
                                        <input type="date" name="start_date"
                                            class="input input-bordered @if ($errors->has('start_date')) input-error @endif">
                                        <div class="label">
                                            @if ($errors->has('start_date'))
                                                <span
                                                    class="label-text-alt text-error">{{ $errors->first('start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">End Date</span>
                                        </label>
                                        <input type="date" name="end_date"
                                            class="input input-bordered @if ($errors->has('end_date')) input-error @endif">
                                        <div class="label">
                                            @if ($errors->has('end_date'))
                                                <span
                                                    class="label-text-alt text-error">{{ $errors->first('end_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Description</span>
                                </label>
                                <textarea name="description" rows="8"
                                    class="textarea textarea-bordered  @if ($errors->has('description')) textarea-error @endif"></textarea>
                                <div class="label">
                                    @if ($errors->has('description'))
                                        <span class="label-text-alt text-error">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card-actions mt-4 justify-end">
                            <button id="cancel-cv">Cancel</button>
                            <button type="submit" class="btn btn-accent">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @endissearcher
    </div>

</x-layout>
