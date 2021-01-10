<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index()
    {
      // $values = Test::all();   　// 1. コレクション
      $values = DB::table('tests')  // 2. クエリビルダ(SQL直接書きたい、細かいSQL、SQLインジェクションに注意)
        // ->select('id')
        ->get();

      // $collection = collect([1, 2, 3, 4, 5, 6, 7]);
      // $chunks = $collection->filter(function($val, $key) {
      //   return $val > 4;
      // });
      // dd($chunks);

      // dd($values);
      // var_dump($values);

      return view('tests.test', compact('values')); // ★ $valuesではない
      // return view('tests.test', ['values' => $values]);
    }
}
