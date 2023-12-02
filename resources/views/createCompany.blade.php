<x-layout>
    <div class="card shadow-cl bg-base-200">
        <form action="/create-company" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h2 class="card-title font-extrabold text-3xl">Create company</h2>
                <div role="alert" class="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Creating a company will make you a recruiter.</span>
                </div>
                <div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" name="name" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Logo</span>
                        </label>
                        <input type="file" name="logo" class="file-input file-input-bordered" />
                    </div>
                </div>

                <div class="card-actions">
                    <button class="btn btn-primary">Create</button>
                </div>

            </div>
        </form>
    </div>
</x-layout>
