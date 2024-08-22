<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'child_category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'price_negotiable' => 'required',
            'condition' => 'required',
            'location' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phone_number' => 'required',
            'is_published' => 'required',
            'featured_image' => 'image|nullable',
            'image_one' => 'image|required',
            'image_two' => 'image|required',
            'image_three' => 'image|required',
        ];
    }
}
