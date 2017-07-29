<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Helper\ResponseHelper;
use Illuminate\Http\Request;

class MaidController extends Controller
{

    public function load($members){

        try{
            $result = Application::where('type', '=', $members)
                ->with('user')->get();

            if(count($result)){
                $payload = ResponseHelper::prepareResponsePayload(200,
                    '', $result->toArray());
            }else{
                $payload = ResponseHelper::prepareResponsePayload(200,
                    'No record found');
            }

        }catch (\Exception $ex){
            $payload = ResponseHelper::prepareResponsePayload(200,
                $ex->getMessage());
        }

        return response()->json($payload);
    }
}
