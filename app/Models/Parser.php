<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parser extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'parsers';
    protected $guarded = false;

    public function getRouteKeyName()
    {
        return 'id';
    }
}
