<?php

namespace App\Contracts;

interface ProductService {

    public function create($params);

    public function update($id, $params);

    public function delete($id);

    public function all();

    public function search($query);

}
