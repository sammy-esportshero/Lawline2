<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //TODO: Inject User and Product model instances by ID
    //TODO: Request objects
    public function attachProductByUser($user_id, $product_id)
    {
      try {
        User::firstOrFail($user_id)->products()->attach($product_id);
        return response()->json(
          ['text' => 'Product '.$product_id.' attached successfully'],
          200
        );
      } catch (\Exception $e) {
        return response()->json(
          ['text' => $e->getMessage()],
          500
        );
      }
    }

    public function removeProductByUser($user_id, $product_id)
    {
      try {
        User::firstOrFail($user_id)->products()->detach($product_id);
        return response()->json(
          ['text' => 'Product '.$product_id.' detached successfully'],
          200
        );
      } catch (\Exception $e) {
        return response()->json(
          ['text' => $e->getMessage()],
          500
        );
      }
    }

    public function listProductsByUser($user_id)
    {
      try{
        return response()->json(
          User::firstOrFail($user_id)->products()->get()->toJson(),
          200
        );
      } catch (\Exception $e) {
        return response()->json(
          ['text' => $e->getMessage()],
          500
        );
      }
    }
}
