<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class ProductImageRequest extends Request
{

    public function authorize()
    {
        return true;
    }

     public function rules()
    {
        return [
            'image'=>'image'
        ];
    }
}
