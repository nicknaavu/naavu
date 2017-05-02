<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AjaxController extends Controller
{
    public function delete_skill(Request $request)
    {
      $str = $request->input('test');
      return response()->json([
        'name'=>$str
      ]);
    }
}
