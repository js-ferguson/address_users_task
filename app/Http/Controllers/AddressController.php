<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'line1' => 'required',
            'city' => 'required',
            'countryCode' => 'required',
            'postalCode' => 'required',
            'stateCode' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $address = new Address();
        $address->user_id = $user_id;
        $address->line1 = $request->input('line1');
        $address->line2 = $request->input('line2');
        $address->line3 = $request->input('line3');
        $address->line4 = $request->input('line4');
        $address->city = $request->input('city');
        $address->postalCode = $request->input('postalCode');
        $address->countryCode = $request->input('countryCode');
        $address->stateCode = $request->input('stateCode');
        $address->stateName = $request->input('stateName');

        return $address->save();
    }

    public function fetch($user_id) {
        // $user = User::where('id', $user_id)->first();
        // $addresses = Address::where('user_id', $user_id)->all();
        $addresses = User::find($user_id)->addresses;

        return $addresses;
    }

    public function update(Request $request) {
        $request->validate([
            'line1' => 'required',
            'city' => 'required',
            'countryCode' => 'required',
            'postalCode' => 'required',
            'stateCode' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $address = Address::find($request->input('id'));

        $address->line1 = $request->input('line1');
        $address->line2 = $request->input('line2');
        $address->line3 = $request->input('line3');
        $address->line4 = $request->input('line4');
        $address->city = $request->input('city');
        $address->postalCode = $request->input('postalCode');
        $address->countryCode = $request->input('countryCode');
        $address->stateCode = $request->input('stateCode');
        $address->stateName = $request->input('stateName');

        return $address->save();
    }

    public function delete($id) {
        $address = Address::find($id);
        $address->delete();
    }
}
