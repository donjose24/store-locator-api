<?php 

namespace App\Contracts;

interface StoreService {

    /*public function create($params);

    public function update($id, $params);

    public function delete($id);

    public function search($query);*/

    public function all();

    public function find($id);
}
