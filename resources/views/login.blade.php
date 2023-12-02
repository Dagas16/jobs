<x-layout>
    <div class="flex justify-center mt-40 ">
        <div class="card shadow-xl bg-base-200">
            <form action="/login" method="POST">
                @csrf
                <div class="card-body">
                    <h2 class="card-title font-extrabold text-3xl">Login</h2>
                    @if ($errors->has('approve'))
                        <div role="alert" class="alert alert-error mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $errors->first('approve') }}</span>
                        </div>
                    @endif
                    <div class=" w-96">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input name="loginemail" type="text"
                                class="input input-bordered @if ($errors->has('loginemail')) input-error @endif">
                            <div class="label">
                                @if ($errors->has('loginemail'))
                                    <span class="label-text-alt text-error">{{ $errors->first('loginemail') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input name="loginpassword" type="password"
                                class="input input-bordered  @if ($errors->has('loginpassword')) input-error @endif">
                            <div class="label">
                                @if ($errors->has('loginpassword'))
                                    <span class="label-text-alt text-error">{{ $errors->first('loginpassword') }}</span>
                                @endif
                            </div>
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
