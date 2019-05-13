<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanc extends Model
{
    // Table Name
    protected $table = 'sanctions';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;

}
