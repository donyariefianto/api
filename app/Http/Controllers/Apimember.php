<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class ApiMember extends Controller
{
    public function login(Request $request){
        $member = Member::where('username', $request['username'],'u_pass', $request['u_pass'])->firstOrFail();
        return response()->json(['message' =>'Success','data' => $member->nama]);
    }
}
