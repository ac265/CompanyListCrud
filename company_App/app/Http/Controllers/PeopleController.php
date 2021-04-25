<?php

namespace App\Http\Controllers;

use App\person;
use App\company;
use App\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function create($company)
    {
        $company = company::findOrFail($company);
        return view('people.create', [
            'company'=> $company,
        ]);
    }


    public function store($company)
    {

        $data = request()->validate([

            'name'=>'required',
            'last_name'=>'required',
            'email_address'=>'required',
            'title'=>'required',
            'phone_number'=>'required'


        ]);


        $company = company::findOrFail($company);

        $person = new \App\person();

        $person->name = $data['name'];
        $person->last_name = $data['last_name'];
        $person->email_address = $data['email_address'];
        $person->title = $data['title'];
        $person->phone_number = $data['phone_number'];
        $person->company_id = $company->id;

        $person->save();

        return view('profiles.index', [
            'company' => $company,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $person = person::find($id);
        return view('people.edit', [
            'person'=> $person,
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->validate([
            'name'=>'required',
            'last_name'=>'required',
            'email_address'=>'required',
            'title'=>'required',
            'phone_number'=>'required'
        ]);


        $person = person::find($id);

        $person->name = $data['name'];
        $person->last_name = $data['last_name'];
        $person->title = $data['title'];
        $person->email_address = $data['email_address'];
        $person->phone_number = $data['phone_number'];

        $person->save();

        return view('profiles.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = person::find($id);
        $person->delete();

        return redirect('#')->with('success', 'Address deleted!');
    }
}
