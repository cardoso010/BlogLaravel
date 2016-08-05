<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests;
use DB;
use App\Models\Artigo;

class ArtigosController extends Controller
{
    public function getIndex(){
        $artigos = Artigo::all();
        return view('artigos.index', compact('artigos'));
    }

    public function getCreate(){
        return view('artigos.create-edit');
    }

    public function postSave(Request $request){
        $artigos = [
            'nome' => $request->input('nome'),
            'artigo' => $request->input('artigo')
        ];
        $artigo = \App\Models\Artigo::create($artigos);
        return redirect('artigos');
    }

    public function getDetalhe($id){
        $artigo = \App\Models\Artigo::find($id);
        return view('artigos.detalhe', compact('artigo'));
    }
}
