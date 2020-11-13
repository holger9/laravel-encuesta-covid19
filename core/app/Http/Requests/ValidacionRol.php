<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidacionRol extends FormRequest {
  /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
  */
  public function authorize(){
    return true;
  }

  /**
     * Get the validation rules that apply to the request.
     *
     * @return array
  */
  public function rules(){
    //verifico si la peticion es post para create o put para update
    switch ($this->method()){
      case 'POST':
        return [
          'name'  => 'required|min:5|max:20|unique:roles',
          'description' => 'required|min:10|max:200'
        ];
      break;

      case 'PATCH':
      case 'PUT':
        return [
          'name' => ['required', 'min:5', 'max:20', Rule::unique('roles')->ignore($this->request->get("name"),'name')],
          'description' => 'required|min:10|max:200'
        ];
      break;
    }
  }

  public function messages(){
    return [
        //mensajes para campo name
        'name.required' => 'El nombre del rol es requerido.',
        'name.min' => 'El nombre del rol debe tener mínimo :min caracteres.',
        'name.max' => 'El nombre del rol debe tener máximo :max caracteres.',
        'name.unique' => 'El nombre del rol ya se encuentra ingresado en el sistema.',

        //mensajes para campo name
        'description.required' => 'La descripción es requerida.',
        'description.min' => 'La descripción debe tener mínimo :min caracteres.',
        'description.max' => 'La descripción debe tener máximo :max caracteres.'
    ];
  }

}
