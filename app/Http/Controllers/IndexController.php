<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Helper\ResponseHelper;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index() {

       $payload = ResponseHelper::prepareResponsePayload(200, [
           'Event' => 'Advoc 8',
           'Team' => 'Team ⁠⁠⁠Apocalypse'
       ]);

       return response()->json($payload);
   }
}
