<?php

namespace App\Repository\IRepository;

use App\Repository\IRepository\IBaseRepository;
use Illuminate\Http\Request;

interface IArtigoRepository extends IBaseRepository {

    public function selectArtigoUserAll();

    public function returnValues(Request $request);

}
