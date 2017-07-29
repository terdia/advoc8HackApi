<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Helper\ResponseHelper;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function apply(Request $request) {

        //TODO add validation
        if ($request->hasFile('picture'))
        {
            $file = $request->file('avatar');
            $filename = "avatar_".md5(microtime()).".".$file->extension();
            $path = $file->storeAs('avatar/', $filename);
            $request->request->add(['avatar' => $path]);
        }

       $application = Application::create($request->all());

        $payload = ResponseHelper::prepareResponsePayload(200, [
            $application->toArray()
        ]);

        return response()->json([
            $payload
        ]);
    }

    public function update(Request $request) {
        //TODO add validation
        if ($request->hasFile('picture'))
        {
            $file = $request->file('avatar');
            $filename = "avatar_".md5(microtime()).".".$file->extension();
            $path = $file->storeAs('avatar/', $filename);
            $request->request->add(['avatar' => $path]);
        }

        $application = Application::where('user_id', $request->input('user_id'))
            ->update($request->all());

        $payload = ResponseHelper::prepareResponsePayload(200, [
            $application->toArray()
        ]);

        return response()->json([
            $payload
        ]);
    }
}
