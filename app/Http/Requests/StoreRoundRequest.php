<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRoundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'players' => ['required'],
            'president_player_id' => ['required', 'integer'],
            'vice_president_player_id' => ['required', 'integer'],
            'trou_player_id' => ['required', 'integer'],
            'vice_trou_player_id' => ['required', 'integer'],
        ];
    }
}
