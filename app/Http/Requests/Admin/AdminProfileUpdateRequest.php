<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'family_name' => ['string', 'max:255'],
            'first_name' => ['string', 'max:255'],
            'sex' => 'string',
            'age' => 'string',
            'institution' => 'string',
            'grade' => ' string',
            'teach_experience' => '',
            'record' => '',
            'comment' => '',
            'portrait_url' => '',
            'zoom_link' => '',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
