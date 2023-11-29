<x-layout>
    <div class="flex flex-col gap-10">
        <div class="card bg-base-200">
            <div class="card-body">
                <h2 class="card-title text-4xl font-bold text-primary">Personalia</h2>
                navn og sånt
            </div>
        </div>
        <div class="card bg-base-200">
            <div class="card-body flex flex-col gap-5">
                <h2 class="card-title text-4xl font-bold text-primary ">Curriculum Vitae</h2>

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
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach

                <form action="/createExperience" method="post" class="">
                    @csrf
                    <div class="form-control">
                        <label for="type" class="label">
                            <span class="label-text">Company</span>
                        </label>
                        <select name="type" class="select select-bordered">

                            <option value="work">Work</option>
                            <option value="education">Education</option>
                            <option value="other">Other</option>

                        </select>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" class="input input-bordered input-secondary">

                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Institution</span>
                        </label>
                        <input type="text" name="institution" class="input input-bordered input-secondary">

                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea name="description" rows="4" class="textarea textarea-bordered"></textarea>

                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Start Date</span>
                        </label>
                        <input type="date" name="start_date" class="input input-bordered input-secondary">

                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">End Date</span>
                        </label>
                        <input type="date" name="end_date" class="input input-bordered input-secondary">

                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-accent">Lagre</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>