<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = ['titre'];


    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }

}


