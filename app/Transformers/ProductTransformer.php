<?php
namespace App\Transformers;

use App\Product;
use League\Fractal;

class ProductTransformer extends Fractal\TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            "id" => $product->id,
            "code" => $product->code,
            "name" => $product->name,
            "price" => $product->price,
            "discounted_price" => $product->discounted_price,
            "description" => $product->description,
            "quantity" => $product->quantity,
            "currency_id" => $product->currency_id,
            "image" => $product->image,
        ];
    }
}
