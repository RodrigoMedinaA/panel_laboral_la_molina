<?php

namespace App\Http\Requests\Carrera;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UpdateCarreraRequest',
    description: 'Request body for updating an existing Carrera',
    properties: [
        new OA\Property(
            property: 'nombre',
            type: 'string',
            description: 'The name of the Carrera'
        ),
    ]
)]
class UpdateCarreraRequest extends FormRequest
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
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
