<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            //
            'nombre'      => 'required|string|max:255',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            // Validación de la imagen:
            // - image: debe ser jpg, jpeg, png, bmp, gif, svg, o webp.
            // - mimes: forzamos solo formatos específicos.
            // - max:2048: tamaño máximo en kilobytes (2MB).
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe estar en formato: jpg, jpeg, png o webp.',
            'imagen.max'   => 'La imagen no debe pesar más de 2MB.',
        ];
    }
}
