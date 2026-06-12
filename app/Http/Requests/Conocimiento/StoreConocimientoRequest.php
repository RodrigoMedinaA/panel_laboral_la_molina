<?php

namespace App\Http\Requests\Conocimiento;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'StoreConocimientoRequest',
    description: 'Request body for storing a new Conocimiento',
    required: ['nombre', 'grupo'],
    properties: [
        new OA\Property(
            property: 'nombre',
            type: 'string',
            description: 'The name of the Conocimiento',
            example: 'Conocimiento'
        ),
        new OA\Property(
            property: 'grupo',
            type: 'string',
            description: 'The group of the Conocimiento',
            example: 'Grupo'
        ),
    ]
)]
class StoreConocimientoRequest extends FormRequest
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
            'nombre' => 'required|string|max:150|unique:conocimientos,nombre',
            'grupo' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.unique' => 'El nombre ya existe',
            'grupo.required' => 'El grupo es obligatorio',
        ];
    }
}
