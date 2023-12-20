<?php

namespace App\Http\Requests\Personal\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'message' => 'required|string',
        ];
    }

    // public function messages(){
    //     return [
    //         'title.required' => 'This field is required',
    //         'title.string' => 'The data must match the string type',
    //         'content.required' => 'This field is required',
    //         'content.string' => 'The data must match the string type',
    //         'preview_image.required' => 'This field is required',
    //         'preview_image.file' => 'You must select a file',
    //         'main_image.required' => 'This field is required',
    //         'main_image.string' => 'You must select a file',
    //         'category_id.required' => 'This field is required',
    //         'category_id.integer' => 'Id must be a number',
    //         'category_id.exists' => 'Id must be in the database',
    //         'tag_ids.array' => 'Need to send an array of data',
    //     ];

    // }

}
