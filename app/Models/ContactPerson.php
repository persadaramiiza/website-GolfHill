<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'whatsapp'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
