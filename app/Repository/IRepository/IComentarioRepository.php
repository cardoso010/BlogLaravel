<?php

namespace App\Repository\IRepository;

use App\Repository\IRepository\IBaseRepository;
use Illuminate\Http\Request;

interface IComentarioRepository extends IBaseRepository {

    public function selectComentarioUserAll($id);

    public function returnValues(Request $request);
    
}
