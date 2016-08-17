<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests;
use Auth;
use App\Repository\IRepository\IArtigoRepository;
use App\Repository\ComentarioRepository;

class ArtigosController extends Controller
{
    public function __construct(IArtigoRepository $artigo)
    {
        $this->artigo = $artigo;
        $this->comentario = new ComentarioRepository();
    }

    public function getIndex()
    {
        $artigos = $this->artigo->selectArtigoUserAll();
        return view('artigos.index', compact('artigos'));
    }

    public function getCreate()
    {
        return view('artigos.create-edit');
    }

    public function postSave(Request $request)
    {
        if(Auth::check()){
            $value = $this->artigo->returnValues($request);
            $return = $this->artigo->save($value);
        }
        return redirect('artigos');
    }

    public function getDetalhe($id)
    {
        $artigo = $this->artigo->find($id);

        $comentarios = $this->comentario->selectComentarioUserAll($id);

        return view('artigos.detalhe', compact('artigo', 'comentarios'));
    }

    public function getEdit($id)
    {
        $artigo = $this->artigo->find($id);

        return view('artigos.edit', compact('artigo'));
    }

    public function postEdit(Request $request)
    {
        if(Auth::check()){
            $artigo = $this->artigo->find($request->input('id'));

            $artigo->nome = $request->input('nome');
            $artigo->descricao = $request->input('descricao');
            $artigo->save();
        }
        return view('artigos');
    }

    public function missingMethod($params = array())
    {
        return 'Erro 404, pagina nao encontrada!';
    }
}
