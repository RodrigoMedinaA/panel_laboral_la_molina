<?php

namespace App\Http\Requests\Conocimiento;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UpdateConocimientoRequest',
    description: 'Request body for updating an existing Conocimiento',
    required: ['nombre', 'grupo'],
    properties: [
        new OA\Property(
            property: 'nombre',
            type: 'string',
            description: 'Nombre del conocimiento',
            example: 'PHP'
        ),
        new OA\Property(
            property: 'grupo',
            type: 'string',
            description: 'Grupo del conocimiento',
            example: 'Framework'
        ),
    ]
)]
class UpdateConocimientoRequest extends FormRequest
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
            'nombre' => 'required|string|max:150|unique:conocimientos,nombre,'.$this->conocimiento->id,
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
