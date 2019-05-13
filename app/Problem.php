<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    // Table Name
    protected $table = 'problems';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;

}
