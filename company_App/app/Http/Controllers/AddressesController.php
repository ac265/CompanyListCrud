<?php

namespace App\Http\Controllers;

use App\address;
use App\company;
use App\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$company= DB::table('companies')->get();

class AddressesController extends Controller
{
    public function create($company)
    {
        $company = company::findOrFail($company);
        return view('addresses.create', [
            'company'=> $company,
        ]);
    }


    public function store($company)
    {


        $data = request()->validate([

            'name'=>'required',
            'address_latitude'=>'required',
            'address_longitude'=>'required',



        ]);

        $company = company::findOrFail($company);

        $address = new \App\address();

        $address->name = $data['name'];
        $address->address_latitude = $data['address_latitude'];
        $address->address_longitude = $data['address_longitude'];
        $address->company_id = $company->id;

        $address->save();

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

        $address = address::find($id);
        return view('addresses.edit', [
            'address'=> $address,
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
        'address_latitude' => 'required',
        'address_longitude' => 'required'
    ]);


    $address = address::find($id);


    $address->name = $data['name'];
    $address->address_latitude = $data['address_latitude'];
    $address->address_longitude = $data['address_longitude'];

    $address->save();

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
    $address = address::find($id);
    $address->delete();

    return redirect('#')->with('success', 'Address deleted!');
}
}
