<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestController extends Controller
{
    public function index(){

        $values = Test::all();
        $count = Test::count();
        $first =Test::findorFail(1);
        $whereBBB =Test::where('text','=','bbb');
 $queryBuilder = DB::table('tests')->where('text','=','bbb')
->select('id','text')
;

        dd($values,$count,$first,$whereBBB,$queryBuilder);
        return view('tests.test', compact('values'));
    }
}
