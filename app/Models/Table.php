<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory , SoftDeletes;

    protected $appends = ['status'];


    /**
     * Get the state of the table relative to the database.
     *
     * @return String $status
     */
    public function getStatusAttribute(): string
    {
        return $this->trashed() ? 'Deleted' : 'Available';
    }
}
