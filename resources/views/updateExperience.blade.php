<x-layout>
    <form id="cv-form" action="/update-experience/{{ $exp->id }}" method="post" class="flex-col gap-1">
        @csrf
        <div class="form-control">
            <label class="label">
                <span class="label-text">Title</span>
            </label>
            <input type="text" name="title"
                class="input input-bordered @if ($errors->has('title')) input-error @endif"
                value="{{ $exp->title }}">
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
                        class="input input-bordered @if ($errors->has('institution')) input-error @endif"
                        value="{{ $exp->institution }}">
                    <div class="label">
                        @if ($errors->has('institution'))
                            <span class="label-text-alt text-error">{{ $errors->first('institution') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-control">
                    <label for="type" class="label">
                        <span class="label-text">Type</span>
                    </label>

                    <select name="type"
                        class="select select-bordered @if ($errors->has('type')) select-error @endif ">
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
                            class="input input-bordered @if ($errors->has('start_date')) input-error @endif"
                            value="{{ $exp->start_date }}">
                        <div class="label">
                            @if ($errors->has('start_date'))
                                <span class="label-text-alt text-error">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">End Date</span>
                        </label>
                        <input type="date" name="end_date"
                            class="input input-bordered @if ($errors->has('end_date')) input-error @endif"
                            value="{{ $exp->end_date }}">
                        <div class="label">
                            @if ($errors->has('end_date'))
                                <span class="label-text-alt text-error">{{ $errors->first('end_date') }}</span>
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
                    class="textarea textarea-bordered  @if ($errors->has('description')) textarea-error @endif">{{ $exp->description }}</textarea>
                <div class="label">
                    @if ($errors->has('description'))
                        <span class="label-text-alt text-error">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>

        </div>
        <div class="card-actions mt-4 justify-end">
            <button id="cancel-cv">Cancel</button>
            <button type="submit" class="btn btn-accent">Save</button>
        </div>
    </form>
</x-layout>
