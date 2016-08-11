<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Comentario;

class ComentariosController extends Controller
{
    public function postSave(Request $request){
        if(Auth::check()){
            $value = [
                'user_id' => Auth::user()->id,
                'artigo_id' => $request->input('artigo_id'),
                'comentario' => $request->input('comentario')
            ];
            $comentario = Comentario::create($value);
        }
        $link = "artigos/detalhe/" . $request->input('artigo_id');
        return redirect($link);
    }
}
