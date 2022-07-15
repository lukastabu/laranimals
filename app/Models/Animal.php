<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food as F;


class Animal extends Model
{
    use HasFactory;
    public function takefood()
    {
        return $this->hasMany(F::class, 'animal_id', 'id');
    }

}
