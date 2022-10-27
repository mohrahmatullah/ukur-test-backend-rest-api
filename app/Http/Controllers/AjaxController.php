<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AjaxController extends Controller
{
    public function selectItemId(Request $req){

        // Request Json
        $request = $req->json()->all();

        // Check Request Berdasarkan Params
        if($request['params'] == 'product_list'){

            // Delete product berdasarkan id
            $data = Product::where('id',$request['id'])->delete();
            if($data){

                // Variable Response Code, Data, Messages, Status
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 

                // Return Response Json
                return response()->json($response);           
            }
        }
    }
}
