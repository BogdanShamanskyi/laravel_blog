<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest
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
            'author' => 'required|by_author',
            'content' => 'required',
        ];
    }

    public function commentData(string $type, int $id): array
    {
        return [
            'author' => $this->get('author'),
            'content' => $this->get('content'),
            'commentable_id' => $id,
            'commentable_type' => $type
        ];
    }
}
