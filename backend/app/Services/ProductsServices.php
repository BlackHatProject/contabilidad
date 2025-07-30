<?php

namespace App\Services;

use App\Contracts\ProductsContract;
use App\Repository\ProductsRepository;
//use App\Repository\;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductsServices implements ProductsContract
{

    public function __construct(protected ProductsRepository $products) {}


    public function consultAll(): Collection
    {
        return $this->products->consultAll();
    }

    public function store(array $data): Model
    {
        return $this->products->store($data);
    }

    public function consultById(string $id): ?Model
    {
        return $this->products->consultById($id);
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
