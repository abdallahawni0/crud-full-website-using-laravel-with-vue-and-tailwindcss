<?php

namespace App\Http\Requests\Table;

use App\Models\Table;
use Illuminate\Foundation\Http\FormRequest;

class TableDeleteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|boolean'
        ];
    }

    /**
     * Delete new data.
     *
     * @return boolean $isDeleted
     */
    public function delete(Table $table) :bool
    {
        if ($this->type){
            return $table->forceDelete();
        }
        return $table->delete();
    }
}
