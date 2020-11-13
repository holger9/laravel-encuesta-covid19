<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidacionUser extends FormRequest
{
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
          'identification' => 'required|digits_between:8,11|numeric|unique:users',
          'fullname' => 'required|min:3|max:30',
          'first_surname' => 'required|min:3|max:30',
          'second_surname' => 'required|min:3|max:30',
          'email' => 'required|email|unique:users|max:40',
          'gender' => 'required',
          'employment' => 'required|max:60',
          'cellphone_number' => 'required|min:10|max:20',
          'roles' => 'required'
        ];
      break;

      case 'PATCH':
      case 'PUT':
        return [
          'identification' => ['required', 'digits_between:8,11', Rule::unique('users')->ignore($this->user->identification,'identification')],
          'fullname' => 'required|min:3|max:30',
          'first_surname' => 'required|min:3|max:30',
          'second_surname' => 'required|min:3|max:30',
          'email' => ['required', 'email', 'max:40', Rule::unique('users')->ignore($this->user->email,'email')],
          'gender' => 'required',
          'employment' => 'required|max:60',
          'cellphone_number' => 'required|min:10|max:20',
          'roles' => 'required'
        ];
      break;
    }
  }

  public function messages(){
    return [
      //mensajes para campo identification
      'identification.required' => 'La identificación es requerida.',
      'identification.digits_between' => 'La identificación debe tener entre :min y :max digitos.',
      'identification.unique' => 'La identificación ya se encuentra ingresada en el sistema.',
      //mensajes para campo fullname

      'fullname.required' => 'El nombre completo es requerido.',
      'fullname.min' => 'El nombre completo debe tener minimo 3 caracteres.',
      'fullname.max' => 'El nombre completo debe tener maximo 30 caracteres.',
      //mensajes para campo first_surname
      'first_surname.required' => 'El primer apellido es requerido.',
      'first_surname.min' => 'El primer apellido debe tener minimo :min caracteres.',
      'first_surname.max' => 'El primer apellido debe tener maximo :max caracteres.',
      //mensajes para campo second_surname
      'second_surname.required' => 'El segundo apellido es requerido.',
      'second_surname.min' => 'El segundo apellido debe tener minimo :min caracteres.',
      'second_surname.max' => 'El segundo apellido debe tener maximo :max caracteres.',
      //mensajes para campo email
      'email.required' => 'El email es requerido.',
      'email.email' => 'El email no es correcto.',
      'email.max' => 'El email debe tener maximo 40 caracteres.',
      'email.unique' => 'El email ya se encuentra ingresada en el sistema.',

      //mensajes para campo gender
      'gender.required' => 'El genero es requerido.',
      //mensajes para campo employment
      'employment.required' => 'El cargo ocupado es requerido.',
      'employment.max' => 'El cargo debe tener máximo 60 caracteres',
      //mensajes para campo cellphone_number
      'cellphone_number.required' => 'El número celular es requerido.',
      'cellphone_number.min' => 'El número celular debe tener minimo 10 caracteres.',
      'cellphone_number.max' => 'El número celular debe tener maximo 20 caracteres.',
      //mensajes para campo roles
      'roles.required' => 'El rol es requerido.'
    ];
  }





}
