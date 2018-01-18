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

        return view('search', ['results' => []]);
    }

    public function discover(){
        $friends = DB::table('relations as rel1')
                    ->join('relations as rel2', 'rel1.user_id', '=', 'rel2.friend_id')
                    ->join('relations as rel3', 'rel2.user_id', '=', 'rel3.friend_id')
                    ->select('rel3.user_id')
                    ->where('rel1.user_id', Auth::user()->id)
                    ->where('rel3.user_id', '!=', Auth::user()->id)
                    ->groupBy('rel3.user_id')
                    ->get();
        $objects = [];
        for($i =0; $i <20; $i++){
            $user = DB::table('users')->select('*')->where('id', $friends[$i]->user_id)->first();
            array_push($objects, $user);
        }
//        return $objects;
        return view('discover', ['users' => $objects]);
    }
    public function search(Request $request)
    {
        $searchValue = $request->searchValue;
        $results = DB::table('users')
            ->leftJoin('relations',  function($join) {
                    $join->on('users.id', '=', 'relations.user_id');
                    })
            ->join('relations_types', 'relations.relation_type', '=', 'relations_types.id')
            ->select('users.id as original_id', 'users.name', 'relations.*', 'relations_types.name as relation_type')
            ->where([['relations.friend_id', '=' ,Auth::user()->id],
                ['users.id', '!=', Auth::user()->id],
                ['users.name', 'LIKE', '%'.$searchValue.'%'] ] )
//            ->orWhereNull('relations.friend_id')

            ->get();

        return view('search', ['results' => $results]);
    }

    public function createFriendship(Request $request)
    {
        $friend = $request->friend;
        $exists = DB::table('relations')->where(['friend_id' => $friend, 'user_id' => Auth::user()->id])->first();
        if(!$exists){
            $result = DB::table('relations')->insert([
                ['user_id' => Auth::user()->id, 'friend_id' => $friend, 'relation_type' => 1],
                ['user_id' => $friend, 'friend_id' => Auth::user()->id, 'relation_type' => 1]
            ]);
        }
        return view('search', ['results' => []]);
    }
}