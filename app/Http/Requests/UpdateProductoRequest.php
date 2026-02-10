<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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
            'nombre'      => 'required|string|max:255',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'category_id' => 'required|exists:categories,id', // <-- ESTO EVITA EL ERROR 500
            'imagen'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para la imagen
            ];
    }
}
