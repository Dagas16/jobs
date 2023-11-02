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
                        <label for="description" class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea name="description" class="textarea textarea-bordered"></textarea>
                    </div>

                    <div class="form-control">
                        <label for="deadline" class="label">
                            <span class="label-text">Deadline</span>
                        </label>
                        <input type="date" name="deadline" class="input input-bordered">
                    </div>

                    <div class="form-control">
                        <label for="company_id" class="label">
                            <span class="label-text">Company</span>
                        </label>
                        <select name="company_id" class="select select-bordered">
                            @foreach ($companies as $company)
                                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-actions">
                    <button class="btn btn-primary">Create</button>
                </div>

            </div>
        </form>
    </div>
</x-layout>
