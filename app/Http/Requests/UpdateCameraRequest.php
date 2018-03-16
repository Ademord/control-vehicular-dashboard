<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCameraRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'ip' => 'required|unique:camaras',
              'lugar_id' =>  'required'
        ];
    }
    
    public function messages()
    {
      return [ 
          'required' => 'Un :attribute es requerido',
          'unique' => 'Ese :attribute ya esta en uso',
      ];
    }
}
