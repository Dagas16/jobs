<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <h2 class="card-title text-2xl">Personalia</h2>
    </div>
    <div class="card bg-base-200">
        <div class="card-body">
            <h2 class="card-title text-2xl">Curriculum Vitae</h2>
            <form action="/createExperience" method="post">
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
                    <input type="text" name="title" class="input input-bordered">

                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Institution</span>
                    </label>
                    <input type="text" name="institution" class="input input-bordered">

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
                    <input type="date" name="start_date" class="input input-bordered">

                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">End Date</span>
                    </label>
                    <input type="date" name="end_date" class="input input-bordered">

                </div>
                <button type="submit" class="btn">Lagre</button>
            </form>
        </div>
    </div>

</x-layout>
