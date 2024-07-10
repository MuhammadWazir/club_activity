<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'joining_date',
        'photo',
        'status',
        'password'
    ];
    public function events():HasMany
    {
        return $this->HasMany(Event::class);
    }
}
