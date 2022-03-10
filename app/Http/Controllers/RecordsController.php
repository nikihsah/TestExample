<?php

namespace App\Http\Controllers;

use App\Models\RecordsModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RecordsController extends Controller
{
    public function records(){
        session_start();
        $records = new RecordsModel();

        return view('records',['records' => $users = DB::table('records_models')
            ->orderBy('created_at', 'desc')
            ->get()]);
    }

    public function newRecords(Request $req){
        $record = new RecordsModel();

        $record->user=$req->input('idUser');
        $record->text=$req->input('text');

        $record->save();
        return redirect()->route('/');
    }

    public static function userName($ids){
        $users = new UsersModel();
        $user = DB::table('users_models')->where('id','=',$ids)->get();
        return $user[0]->login;
    }

    public function deleteRecord(Request $req){
        DB::table('records_models')->where('id', '=', $req->input('id'))->delete();

        return redirect()->route('/');
    }
}
