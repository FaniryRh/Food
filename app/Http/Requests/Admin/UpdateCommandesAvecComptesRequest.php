<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommandesAvecComptesRequest extends FormRequest
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
            
            'compte_id' => 'required',
            'adresse_de_livraison' => 'required',
            'date_heur_souhaitee' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'date_depot_cmd' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'date_livre_cmd' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'total_addition' => 'max:2147483647|nullable|numeric',
            'date_encaisse' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
