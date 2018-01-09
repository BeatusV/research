<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 9-1-2018
 * Time: 14:47
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class SearchController
{


    public function index()
    {

        return view('search');
    }

    public function search(Request $request)
    {
        $searchValue = $request->searchValue;
        $results = DB::table('users')->where([['name', 'LIKE', '%'.$searchValue.'%'],['id', '!=', Auth::user()->id]])->get();
        return view('search', ['results' => $results]);
    }
}