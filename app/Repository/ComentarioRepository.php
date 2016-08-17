<?php

namespace App\Repository;

use App\Repository\IRepository\IComentarioRepository;
use App\Models\Comentario;
use DB;
use Illuminate\Http\Request;
use Auth;

class ComentarioRepository implements IComentarioRepository
{
    public function selectAll()
    {
        return Comentario::all();
    }

    public function find($id)
    {
        return Comentario::find($id);
    }

    public function save($comentario){
        return Comentario::create($comentario);
    }

    public function delete($id)
    {
        $comentario = Comentario::find($id);
        return $comentario->delete();
    }


    public function selectComentarioUserAll($id)
    {
        return DB::table('comentarios')
                            ->select('comentarios.comentario', 'users.name')
                            ->leftJoin('users', 'users.id', '=', 'comentarios.user_id')
                            ->where('comentarios.artigo_id', '=', $id)
                            ->get();
    }

    public function returnValues(Request $request)
    {
        return [
                'user_id' => Auth::user()->id,
                'artigo_id' => $request->input('artigo_id'),
                'comentario' => $request->input('comentario')
            ];
    }

}
