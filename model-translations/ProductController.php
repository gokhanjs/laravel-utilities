<?php

namespace App;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController
{
    public function __construct(
        protected ProductRepository $products,
    ) {}

    public function index(Request $request)
    {
        $products = $this->products->getProducts($request->get('per_page', 10), $request->get('page', 1));

        return response()->json([
            'data' => $products->map(function ($product){
               return [
                   "id" => $product->id,
                   /*
                    * get the name of the product in the active language if it exists
                    * otherwise get the name of the product in the first language
                    * active language using app()->getLocale()
                    * */
                   "name" => $this->activeLanguage?->name ? $this->activeLanguage->name : $this->translations->first()?->name,
               ];
            });
        ]);
    }
}
