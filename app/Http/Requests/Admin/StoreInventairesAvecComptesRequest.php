<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventairesAvecComptesRequest extends FormRequest
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
            'cmd_compt_id' => 'required',
            'produit_id' => 'required',
            'options.*' => 'exists:options,id',
            'quantite' => 'max:2147483647|required|numeric',
        ];
    }
}
