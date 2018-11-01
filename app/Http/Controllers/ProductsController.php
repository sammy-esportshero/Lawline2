<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
        return response()->json(
          Product::all()->toJson(),
          200
        );
      } catch (\Exception $e) {
        return response()->json(
          ['text' => $e->getMessage()],
          500
        );
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
      try{
        $newFields = [
          'name' => $request->get('name'),
          'description' => $request->get('description'),
          'price' => $request->get('price'),
          'image' => $request->get('image')
        ];

        Product::create($newFields);

        return response()->json(
          ['text' => 'Product created successfully'],
          200
        );
      } catch (\Exception $e) {
        return response()->json(
          ['text' => $e->getMessage()],
          500
        );
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try{
        return response()->json(
          Product::firstOrFail($id)->toJson(),
          200
        );
      } catch (\Exception $e) {
        return response()->json(
          ['text' => $e->getMessage()],
          500
        );
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try{
          $newFields = [
              'name' => $request->get('name'),
              'description' => $request->get('description'),
              'price' => $request->get('price'),
              'image' => $request->get('image')
          ];

          Product::firstOrFail($id)->update($newFields);
          return response()->json(
            ['text' => 'Product '.$id.' updated successfully'],
            200
          );
        } catch (\Exception $e) {
          return response()->json(
            ['text' => $e->getMessage()],
            500
          );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Product::firstOrFail($id)->delete();
            return response()->json(
              ['text' => 'Product '.$id.' deleted successfully'],
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
