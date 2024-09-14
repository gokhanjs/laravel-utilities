<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class PeriodRepository implements ProductInterface
{
    public function __construct(
        protected Product $model
    ){}


    public function getProducts($perPage = 10, $page = 1)
    {
        return $this->model
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
