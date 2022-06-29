<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CSetting extends Controller
{
    public function saveCall(Request $request)
    {
        DB::table('setting')->where('kode', 'call_darurat')->update(['value' => $request->no_darurat]);
        return response()->json(['status'=>true,'msg'=>'oke']);
    }
}
