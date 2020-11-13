<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateQuestionary extends FormRequest
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
    public function rules(){
      return [
        'name'  => 'required|min:10|max:70'
      ];
    }
    public function messages(){
      return [
        //mensajes para campo name
        'name.required' => 'El título del cuestionario es requerido.',
        'name.min' => 'El título del cuestionario debe tener mínimo :min caracteres.',
        'name.max' => 'El título del cuestionario debe tener máximo :max caracteres.',
      ];
    }
}
