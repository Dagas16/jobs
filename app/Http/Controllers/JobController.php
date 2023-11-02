<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
}
