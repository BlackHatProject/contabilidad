<?php

namespace App\Services;

use App\Contracts\InventoryLotsContract;
use App\Repository\InventoryLotsRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InventoryLotsServices implements InventoryLotsContract
{

    public function __construct(protected InventoryLotsRepository $repository) {}


    /*public function consultAll(): Collection
    {
        return $this->repository->consultAll();
    }*/

    public function store(array $data): Model
    {
        return $this->repository->store($data);
    }

    public function consultFIFO(string $id): ?Model
    {
        return $this->repository->consultFIFO($id);
    }

    /*public function storeProduct(array $data): Model
    {
        return $this->products->storeProduct($data);
    }

    public function editProduct(array $data): Model
    {
        return $this->products->editProduct($data);
    }

    public function edit(array $data): Model
    {
        return $this->products->edit($data);
    }*/
}
