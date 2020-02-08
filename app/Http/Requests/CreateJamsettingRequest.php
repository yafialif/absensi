<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJamsettingRequest extends FormRequest {

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
            'namemosque' => 'required', 
            'alamat' => 'required', 
            'logitude' => 'required', 
            'latitude' => 'required', 
            'waktuadzan' => 'required', 
            'countdown' => 'required', 
            'dzikir_time' => 'required', 
            'slider1' => 'required', 
            'slider2' => 'required', 
            'slider3' => 'required', 
            
		];
	}
}
