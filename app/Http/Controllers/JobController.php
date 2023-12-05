<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function createJob(Request $request)
    {
        $incomingFields = $request->validate([
            "title" => "required",
            "description" => "required",
            "deadline" => ["required", "date"],
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['deadline'] = strip_tags($incomingFields['deadline']);
        $incomingFields['company_id'] = User::where('id', Auth::user()->id)->select()->first()->company_id;

        Job::create($incomingFields);
        return redirect("/dashboard");
    }

    public function editJob(Request $request, $id)
    {
        $job = Job::find($id);
        if ($job->company_id != auth()->user()->company_id) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => ["required", "date"],
        ]);

        $job->title = strip_tags($incomingFields["title"]);
        $job->description = strip_tags($incomingFields["description"]);
        $job->deadline = strip_tags($incomingFields["deadline"]);

        $job->save();


        return redirect('/dashboard');
    }

    public function sendApplication(Request $request, string $id)
    {
        $incomingFields = $request->validate([
            "cover_letter" => "required"
        ]);

        $incomingFields["cover_letter"] = strip_tags($incomingFields["cover_letter"]);
        $incomingFields["job_id"] = strip_tags($id);
        $incomingFields["user_id"] = auth()->id();

        JobApplication::create($incomingFields);

        return redirect("/job/" . $id . "/success");
    }
}
