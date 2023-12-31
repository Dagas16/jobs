<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function createCompany(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $incomingFields = $request->validate([
            "name" => "required",
            "logo" => "required"
        ]);

        $image = $request->file('logo')->store('public');
        $logoPath = Storage::url($image);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['logo_path'] = $logoPath;


        $company = Company::create($incomingFields);
        $user->update(['company_id' => $company->id]);


        return redirect("/dashboard");
    }

    public function editCompany(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $company = $user->company;

        $incomingFields = $request->validate([
            "name" => "required",
            "logo" => "image"
        ]);


        if ($request->logo != null) {

            $image = $request->file('logo')->store('public');
            $logoPath = Storage::url($image);
            $company->logo_path = $logoPath;
        }



        $company->name = strip_tags($incomingFields['name']);


        $company->save();


        return redirect("/dashboard");
    }
}
