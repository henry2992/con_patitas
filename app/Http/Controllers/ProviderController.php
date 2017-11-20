<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveProviderToPetProfile(Request $request ,$petId , $providerName)
    {

        $providerId = Provider::where('name',$providerName)->first();

        $pet = Pet::where('id',$petId)->update(array('provider_id'=>$providerId->id));

        if($pet){
            if($request->ajax())
            {
                return response()->json(array('status'=>'success'));
            }else{
                /* something to do */
            }
        }else{
            response()->json(array('status'=>'fail'));
        }
    }
}
