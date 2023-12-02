<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $logoPath = $request->file('logo')->store("image");

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['logo_path'] = $logoPath;


        $company = Company::create($incomingFields);
        $user->update(['company_id' => $company->id]);


        return redirect("/dashboard");
    }
}
