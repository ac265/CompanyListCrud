<?php

namespace App\Http\Controllers;

use App\company;
use App\profile;
use App\address;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($company){
        //dd(company::find('$company'));
        //$company = company::all();
        $company = company::findOrFail($company);
        /*$address = address::findOrFail($company);
        if($address->company_id = $company->id ) {*/
            return view('profiles.index', [
                'company' => $company,
            ]);

    }

    public function show($id)
    {
        $company = profile::find($id);
        return view('profiles.index', compact('profile'));
    }
}
