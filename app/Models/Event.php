<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'category',
        'date_from',
        'date_to',
        'cost',
        'status'
    ];
    public function  users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function guide():BelongsTo
    {
        return $this.belongsTo(Event::class);
    }
}
