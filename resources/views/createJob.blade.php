<x-layout>
    <div class="card shadow-cl bg-base-200">
        <form action="/create-job" method="POST">
            @csrf
            <div class="card-body">
                <h2 class="card-title font-extrabold text-3xl">Create job</h2>

                <div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label for="short_description" class="label">
                            <span class="label-text">Short Description</span>
                        </label>
                        <textarea name="short_description" class="textarea textarea-bordered"></textarea>
                    </div>

                    <div class="form-control">
                        <label for="description" class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea name="description" class="textarea textarea-bordered" rows="10"></textarea>
                    </div>

                    <div class="form-control">
                        <label for="deadline" class="label">
                            <span class="label-text">Deadline</span>
                        </label>
                        <input type="date" name="deadline" class="input input-bordered">
                    </div>
                </div>

                <div class="card-actions">
                    <button class="btn btn-primary">Create</button>
                </div>

            </div>
        </form>
    </div>
</x-layout>
