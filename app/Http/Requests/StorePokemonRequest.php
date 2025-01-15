<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\DTO\Pokemon\PokemonDTO;

class StorePokemonRequest extends FormRequest
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
            'pokemon' => 'bail|required|min:3|max:15'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Erros de validação',
            'data' => $validator->errors()
        ]));
    }

    public function messages(): array
    {
        return [
            'pokemon.required' => 'O campo pokemon deve ser preenchido',
            'pokemon.min' => 'O campo pokemon deve ter no mínimo 3 caracteres',
            'pokemon.max' => 'O campo pokemon deve ter no máximo 15 caracteres',
        ];
    }

    public function getData(): PokemonDTO
    {
        return PokemonDTO::create($this->all());
    }
}
