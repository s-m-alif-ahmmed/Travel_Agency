<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FileCheckRule;

class HotelRequest extends FormRequest
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
            'hotel_name'        => "required|unique:hotels,hotel_name,".request()->id,
            'place_name'        => 'required',
            'hotel_type'        => 'required',
            'hotel_location'    => 'required',
            'hotel_rating'      => 'required|lte:5',
            'hotel_description' => 'required',
     
        ];
        if(request()->routeIs('hotel.save')){
            $rules['hotel_image'] = ['required', 'image', new FileCheckRule([
                'png', 'jpg', 'jpeg'
            ],
            'image')];
        }


        return  $rules;
    }
}
