<?php

namespace ClaudiusNascimento\ModelImages\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $this->errorBag = $this->get('errorBag', 'default');


        return [
            'rel' => 'required|string',
            'rel_id' => 'required|integer',
            'file_image' => 'required|mimes:jpeg,png',
            'order' => 'integer',
            // 'key' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rel.required' => 'Sem identificação de relação',
            'rel.string' => 'Relação inválida',
            'rel_id.required' => 'Sem identificação de instância',
            'rel_id.integer' => 'ID da instância inválido',
            'file_image.required' => 'A imagem é obrigatória',
            'file_image.mimes' => 'A imagem deve ser JPG ou PNG',
            'order.integer' => 'Ordem deve ser um número inteiro',
            // 'key.required' => 'Preencha a chave',
        ];
    }

    public function prepareForValidation()  {

        $order = $this->get('order');

        if(!$order || !is_int($order)) {
            $this->merge(['order' => 0]);
        }

        $this->merge(['active' => $this->has('active')]);

    }

}
