<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'content' => 'required',
            'categories' => 'required',
            'file' => 'max:2048'
        ];
    }

    public function postData(): array
    {
        return [
            'name' => $this->get('name'),
            'content' => $this->get('content'),
            'file' => $this->getFileName(),
            'categories' => $this->input('categories')
        ];
    }

    private function getFileName(): string
    {
        if($this->hasFile('file')) {
            $file = $this->file('file');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('PostsFiles'), $fileName);
        }

        return $fileName ?? '';
    }
}
