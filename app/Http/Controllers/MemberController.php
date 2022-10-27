<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // GET Member
        $member = Member::all();

        // Array Variable
        $data = array();

        // Loop Member
        foreach($member as $row){
            $data[] = $row;
        }

        // Variable Response Code, Data, Messages, Status
        $response = ['code' => 200, 'data' => $data, 'msg' => null, 'status' => true];

        // Return Response Json
        return response()->json($response);
        
    }

    public function save(Request $request)
    {
        $data = Http::get(url('sample.json'))->json();

        foreach($data as $row){

            foreach($row['details'] as $val){
                if($val['balance'] < 10000){
                    $rows['favoriteTransportation'] = $row['favoriteTransportation'];
                    $rows['name']                   = $val['name'];
                    $rows['balance']                = $val['balance'];
                    $result[]                       = $rows;
                }
            }

        }

        foreach($result as $row){
            $save[] = $this->create($row);
        }

        if($save){
            // Variable Response Code, Data, Messages, Status
            $response = ['code' => 200, 'data' => $save, 'msg' => null, 'status' => true];

            // Return Response Json
            return response()->json($response);
        }
        
    }

    public function create($request)
    {

        $products = new Member;

        $products->name                 = $request['name'];
        $products->balance              = $request['balance'];
        $products->transportation       = $request['favoriteTransportation'];      
        $products->save();

        // Return Data
        return $products;    

    }

}
