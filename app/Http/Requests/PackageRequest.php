<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FileCheckRule;

class PackageRequest extends FormRequest
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
            'tour_title'          => "required|unique:packages,tour_title,".request()->id,
            'tour_rating'         => 'required|lte:5',
            'tour_address'        => 'required',
            'package_category_id' => 'required',
            'place_id'            => 'required',
            'tour_start_date'     => 'required',
            'tour_end_date'       => 'required',
            'price'               => 'required',
            'overview'            => 'required',
            'meeting_pickup'      => 'required',
            'expectations'        => 'required',
            'included_excluded'   => 'required',
            'terms_conditions'    => 'required',
        ];
        if(request()->routeIs('package.save')) {

            $rules['package_image'] = ['required', 'image', new FileCheckRule([
                'png', 'jpg', 'jpeg'
            ],
            'image')];

            $rules['other_image']   = ['required', new FileCheckRule([
                'png', 'jpg', 'jpeg'
            ],
            'image')];
        }
        return  $rules;

    }
}
