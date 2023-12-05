<x-layout>
    {{-- <div class="flex mb-10">
        <div class="grow">
            <h1 class="text-3xl font-extrabold">{{ $job['title'] }}</h1>
            <div>
                {{ $job['description'] }}
            </div>
        </div>
        <div class="card card-compact bg-base-200 shadow-xl w-96">
            <figure class="px-5 pt-5">
                <img src="{{ asset($job['company_logo_path']) }}" class="rounded-xl max-w-[300px] max-h-[100px]" />
            </figure>
            <div class="card-body item-center text-center">
                <h2 class="text-xl text-bold">{{ $job['company_name'] }}</h2>
            </div>
        </div>
    </div> --}}

    <div class="card bg-base-200 shadow-xl">
        <div class="card-body">

            <form action="/dashboard/job/{{ $job->id }}/edit" method="POST">
                @csrf

                <h2 class="card-title font-extrabold text-4xl">Edit listing for <span
                        class="text-primary">{{ $job->title }}</span></h2>

                <div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" class="input input-bordered" value="{{ $job->title }}">
                    </div>
                    <div class="form-control">
                        <label for="short_description" class="label">
                            <span class="label-text">Short Description</span>
                        </label>
                        <textarea name="short_description" class="textarea textarea-bordered">{{ $job->short_description }}</textarea>
                    </div>
                    <div class="form-control">
                        <label for="description" class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea name="description" class="textarea textarea-bordered" rows="20">{{ $job->description }}</textarea>
                    </div>

                    <div class="form-control">
                        <label for="deadline" class="label">
                            <span class="label-text">Deadline</span>
                        </label>

                        <input type="date" name="deadline" class="input input-bordered"
                            value="{{ $job->deadline->toDateString() }}">
                    </div>



                </div>

                <div class="card-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </form>

        </div>

    </div>
</x-layout>
