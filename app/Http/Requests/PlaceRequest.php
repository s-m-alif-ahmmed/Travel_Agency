<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FileCheckRule;

class PlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'place_name'        => "required|unique:places,place_name,".request()->id,
            'place_description' => 'required',
            
        ];
        if(request()->routeIs('places.save')){
            $rules['place_image'] = ['required', 'file', new FileCheckRule(null, 'video')];
        }
        return  $rules;
    }
}
