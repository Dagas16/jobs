<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function createJob(Request $request)
    {
        $incomingFields = $request->validate([
            "title" => "required",
            "description" => "required",
            "deadline" => ["required", "date"],
            "company_id" => "required"
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['deadline'] = strip_tags($incomingFields['deadline']);

        Job::create($incomingFields);
        return redirect("/");
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
