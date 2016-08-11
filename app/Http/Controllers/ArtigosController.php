<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests;
use DB;
use App\Models\Artigo;
use Auth;

class ArtigosController extends Controller
{
    public function getIndex(){
        //$artigos = Artigo::all();
        $artigos = DB::table('artigos')
                            ->select('artigos.id', 'artigos.nome', 'artigos.descricao', 'users.name')
                            ->leftJoin('users', 'users.id', '=', 'artigos.user_id')
                            ->get();
        return view('artigos.index', compact('artigos'));
    }

    public function getCreate(){
        return view('artigos.create-edit');
    }

    public function postSave(Request $request){
        if(Auth::check()){
            $artigos = [
                'nome' => $request->input('nome'),
                'user_id' => Auth::user()->id,
                'descricao' => $request->input('descricao')
            ];
            $artigo = \App\Models\Artigo::create($artigos);
        }
        return redirect('artigos');
    }

    public function getDetalhe($id){
        $artigo = Artigo::find($id);

        $comentarios = DB::table('comentarios')
                            ->select('comentarios.comentario', 'users.name')
                            ->leftJoin('users', 'users.id', '=', 'comentarios.user_id')
                            ->where('comentarios.artigo_id', '=', $id)
                            ->get();
        return view('artigos.detalhe', compact('artigo', 'comentarios'));
    }
}
