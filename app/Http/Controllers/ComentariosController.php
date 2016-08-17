<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Comentario;
use App\Repository\IRepository\IComentarioRepository;

class ComentariosController extends Controller
{
    public function __construct(IComentarioRepository $comentario)
    {
        $this->comentario = $comentario;
    }

    public function postSave(Request $request){
        if(Auth::check()){
            $value = $this->comentario->returnValues($request);
            $comentario = $this->comentario->save($value);
        }
        $link = "artigos/detalhe/" . $request->input('artigo_id');
        return redirect($link);
    }

    public function missingMethod($params = array()){
        return 'Erro 404, pagina nao encontrada!';
    }
}
