<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInteraccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambia a `true` si quieres usar la autorización basada en usuarios
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
            'perro_interesado_id' => 'required|exists:perros,id',
            'perro_candidato_id' => 'required|exists:perros,id|different:perro_interesado_id',
            'preferencia' => 'required|in:aceptado,rechazado',
        ];
    }
}
