<?php
/**
 * Created by PhpStorm.
 * User: Sammy
 * Date: 9/15/2017
 * Time: 5:55 PM
 */
namespace App\Http\Requests;

use Illuminate\Http\Request;

class UpdateProductRequest extends Request
{
    public function authorize()
    {
        return true; //TODO
    }

    public function rules()
    {
      return [
          'name' => 'required|min:5',
          'description' => 'required|min:5',
          'price' => 'required|numeric'
      ];
    }
}