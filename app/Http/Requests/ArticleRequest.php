<?php

namespace App\Http\Requests;

use App\Attachment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required'],
            'content' => ['required', 'min:5'],
            'tags' => ['required', 'array'],
            'files' => ['array'],
            //'files.*' => ['mimes:jpg,png,zip,tar.doc', 'max:30000'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributes is required field.',
            'min' => ':attributes is minimun over 5 characters.',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

    public function getPayload()
    {
        return array_merge($this->all(), [
            'notification' => $this->has('notification'),
        ]);
    }

    /**
     * 사용자 입력 값으로부터 첨부파일 객체를 조회합니다.
     *
     * @return Collection
     */
    public function getAttachments()
    {
        return Attachment::whereIn(
            'id',
            $this->input('attachments', [])
        )->get();
    }
}
