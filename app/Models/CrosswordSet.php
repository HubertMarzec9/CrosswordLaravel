<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrosswordSet extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'holiday'];

    public function questions()
    {
        return $this->hasMany(CrosswordQuestion::class, 'set_id');
    }
}
