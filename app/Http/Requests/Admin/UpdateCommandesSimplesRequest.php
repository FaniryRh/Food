<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommandesSimplesRequest extends FormRequest
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
            
            'nom_client' => 'required',
            'adresse_client' => 'required',
            'phone_client' => 'required',
            'adresse_de_livraison' => 'required',
            'total_addition' => 'max:2147483647|nullable|numeric',
            'date_encaisse' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'date_heur_souhaitee' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'date_heur_arrive_livr' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
