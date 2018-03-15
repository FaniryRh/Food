<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreComptesRequest extends FormRequest
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
            'nom_compte' => 'required',
            'prenom_compte' => 'required',
            'mdp_compte' => 'required',
            'phone_compte' => 'required',
            'mail_compte' => 'required',
            'adresse_compte' => 'required',
            'ville_compte' => 'required',
            'quartier_compte' => 'required',
        ];
    }
}
