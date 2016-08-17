<?php

namespace App\Repository\IRepository;

interface IBaseRepository {

    public function selectAll();

    public function find($id);

    public function save($value);

    public function delete($id);

}
