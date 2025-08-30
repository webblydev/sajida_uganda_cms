<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'news_category_id' => 'required|exists:news_categories,id',
            'paragraph_one' => 'required|string',
            'paragraph_two' => 'required|string',
            'paragraph_three' => 'required|string',
        ];

        // For create request, all images are required
        if ($this->isMethod('post')) {
            $rules['banner_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
            $rules['thumbnail_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
            $rules['article_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        
        // For update request, images are optional
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['banner_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            $rules['thumbnail_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            $rules['article_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'news_category_id.required' => 'Please select a news category.',
            'news_category_id.exists' => 'The selected category does not exist.',
            'banner_image.required' => 'Banner image is required.',
            'banner_image.image' => 'Banner image must be an image file.',
            'banner_image.max' => 'Banner image size cannot exceed 2MB.',
            'thumbnail_image.required' => 'Thumbnail image is required.',
            'thumbnail_image.image' => 'Thumbnail image must be an image file.',
            'thumbnail_image.max' => 'Thumbnail image size cannot exceed 2MB.',
            'article_image.required' => 'Article image is required.',
            'article_image.image' => 'Article image must be an image file.',
            'article_image.max' => 'Article image size cannot exceed 2MB.',
            'paragraph_one.required' => 'Paragraph one is required.',
            'paragraph_two.required' => 'Paragraph two is required.',
            'paragraph_three.required' => 'Paragraph three is required.',
        ];
    }
}
