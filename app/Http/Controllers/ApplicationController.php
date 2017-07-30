<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Helper\ResponseHelper;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function apply(Request $request) {

        try{
            //TODO add validation
            if ($request->hasFile('picture'))
            {
                $file = $request->file('avatar');
                $filename = "avatar_".md5(microtime()).".".$file->extension();
                $path = $file->storeAs('avatar/', $filename);
                $request->request->add(['avatar' => $path]);
            }

            Application::create($request->all());

            $result = Application::where('user_id', '=', $request->input('user_id'))
                ->with('user')->first();

            $payload = ResponseHelper::prepareResponsePayload(200, '', $result->toArray());

        }catch (\Exception $ex){
            $payload = ResponseHelper::prepareResponsePayload(500, $ex->getMessage());
        }

        return response()->json($payload);
    }

    public function update(Request $request) {
        //TODO add validation
        try{
            if ($request->hasFile('picture'))
            {
                $file = $request->file('avatar');
                $filename = "avatar_".md5(microtime()).".".$file->extension();
                $path = $file->storeAs('avatar/', $filename);
                $request->request->add(['avatar' => $path]);
            }

            Application::where('id', $request->input('id'))
                ->update($request->all());

            $result = Application::where('user_id', '=', $request->input('user_id'))
                ->with('user')->first();

            if($result){
                $payload = ResponseHelper::prepareResponsePayload(200, '', $result);
            }else{
                $payload = ResponseHelper::prepareResponsePayload(200, '', []);
            }
        }catch (\Exception $ex){
            $payload = ResponseHelper::prepareResponsePayload(500, $ex->getMessage());
        }

        return response()->json($payload);
    }
}
