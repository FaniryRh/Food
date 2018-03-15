<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitsRequest extends FormRequest
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
        return [
            'photo_produit' => 'mimes:png,jpg,jpeg,gif|required',
            'designation_produit' => 'required|unique:produits,designation_produit,'.$this->route('produit'),
            'categorie_id' => 'required',
            'option_id.*' => 'exists:options,id',
            'prix_unit_produit' => 'max:2147483647|required|numeric',
        ];
    }
}
