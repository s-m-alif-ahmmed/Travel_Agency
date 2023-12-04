<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FileCheckRule;

class ClientReviewRequest extends FormRequest
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
            'client_name'        => "required|unique:client_reviews,client_name,".request()->id,
            'client_rating' => 'required|lte:5',
            'client_description' => 'required',
     
        ];
        if(request()->routeIs('client.save')){
            $rules['client_image'] = ['required', 'image', new FileCheckRule([
                'png', 'jpg', 'jpeg'
            ],
            'image')];
        }


        return $rules;
    }
}
