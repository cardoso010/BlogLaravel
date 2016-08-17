<?php

namespace App\Repository;

use App\Repository\IRepository\IArtigoRepository;
use App\Models\Artigo;
use DB;
use Illuminate\Http\Request;
use Auth;

class ArtigoRepository implements IArtigoRepository {

    public function selectAll()
    {
        return Artigo::all();
    }

    public function find($id)
    {
        return Artigo::find($id);
    }

    public function save($artigo){
        return Artigo::create($artigo);
    }

    public function delete($id)
    {
        $artigo = Artigo::find($id);
        return $artigo->delete();
    }

    public function selectArtigoUserAll()
    {
        return DB::table('artigos')
                            ->select('artigos.id', 'artigos.nome', 'artigos.descricao', 'users.name')
                            ->leftJoin('users', 'users.id', '=', 'artigos.user_id')
                            ->get();
    }

    public function returnValues(Request $request)
    {
        return [
                'nome' => $request->input('nome'),
                'user_id' => Auth::user()->id,
                'descricao' => $request->input('descricao')
               ];
    }

}
