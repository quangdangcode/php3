<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
            'catelory_id' => 'required|exists:catelories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tên bài viết',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
            'image.required' => 'Vui lòng chọn ảnh',
        ];
    }
}
