<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsModel extends Model
{
    protected $table = 'details';  // Specify the table name
    protected $primaryKey = 'id';  // Specify the primary key column name
    public $incrementing = true;   // Primary key auto-increments (default true)
    protected $keyType = 'int';    // The primary key is of type integer

    // Allow mass assignment for the following fields
    protected $fillable = [
        'name',
        'roll',
        'city',
        'phone',
        'class',
    ];
}
