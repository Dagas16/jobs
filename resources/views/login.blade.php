<x-layout>
    <div class="flex justify-center mt-40 ">
        <div class="card shadow-xl bg-base-200">
            <form action="/login" method="POST">
                @csrf
                <div class="card-body">
                    <h2 class="card-title font-extrabold text-3xl">Login</h2>
                    <div class=" w-96">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input name="loginemail" type="text" class="input input-bordered">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input name="loginpassword" type="password" class="input input-bordered">
                        </div>
                    </div>
                    <div class="card-actions flex items-center">
                        <button class="btn btn-primary">Login</button> or
                        <a href="/register" class="link-hover cursor-pointer">register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
