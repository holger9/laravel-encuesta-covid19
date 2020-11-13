<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateQuestion extends FormRequest {
  /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
  */
  public function authorize() {
    return true;
  }

  /**
     * Get the validation rules that apply to the request.
     *
     * @return array
  */
  public function rules() {
    return [
      //'question' => 'required',
      //'total' => 'size:2'
    ];
  }

  public function messages() {
    return [
      //'question.required' => 'El título de la pregunta es requerido.',
      //'total.size' => 'Debe agregar al menos dos opciones de respuesta para la pregunta actual.'
    ];
  }
}
