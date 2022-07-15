<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal as A;

class Food extends Model
{
    use HasFactory;
    public function takeanimal() {
        return $this->belongsTo(A::class, 'animal_id', 'id');
    }
}
