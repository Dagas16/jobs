<x-layout>
    <div class="flex justify-center mt-40">
        <div class="card shadow-xl bg-base-200">
            <form action="/register" method="POST">
                @csrf
                <div class="card-body">
                    <h2 class="card-title font-extrabold text-3xl">Register</h2>
                    <div class=" w-96">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input name="name" type="text" value="{{ old('name') }}"
                                class="input input-bordered @if ($errors->has('name')) input-error @endif">
                            <div class="label">
                                @if ($errors->has('name'))
                                    <span class="label-text-alt text-error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input name="email" type="text" value="{{ old('email') }}"
                                class="input input-bordered @if ($errors->has('email')) input-error @endif">
                            <div class="label">
                                @if ($errors->has('email'))
                                    <span class="label-text-alt text-error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input name="password" type="password"
                                class="input input-bordered @if ($errors->has('password')) input-error @endif">
                            <div class="label">
                                @if ($errors->has('password'))
                                    <span class="label-text-alt text-error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-actions flex items-center">
                        <button class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



</x-layout>
