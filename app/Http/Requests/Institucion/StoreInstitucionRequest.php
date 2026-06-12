<?php

namespace App\Http\Requests\Institucion;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'StoreInstitucionRequest',
    description: 'Request body for creating a new Institucion',
    required: ['raz_social', 'nombre'],
    properties: [
        new OA\Property(
            property: 'raz_social',
            type: 'string',
            description: 'Razon social de la institucion',
            example: 'Universidad de San Martin de Porres'
        ),
        new OA\Property(
            property: 'nombre',
            type: 'string',
            description: 'Nombre de la institucion',
            example: 'USMP'
        ),
    ]
)]
class StoreInstitucionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'raz_social' => 'required|string|max:255|unique:instituciones,raz_social',
            'nombre' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'raz_social.required' => 'La razón social es obligatoria',
            'raz_social.unique' => 'La razón social ya existe',
            'nombre.required' => 'El nombre es obligatorio',
        ];
    }
}
