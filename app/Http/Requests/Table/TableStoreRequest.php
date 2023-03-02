<?php

namespace App\Http\Requests\Table;

use App\Models\Table;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'details' => 'required|string'
        ];
    }

    /**
     * Create new data.
     *
     * @return boolean $isSaved
     */
    public function store() :bool
    {
        $table = new Table();
        $table->title = $this->title;
        $table->details = $this->details;

        return $table->save();
    }
}
