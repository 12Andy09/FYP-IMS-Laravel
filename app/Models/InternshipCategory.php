<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_title',
    ];

    public function internship(): HasMany
    {
        return $this->hasMany(Internship::class, 'internship_category_id');
    }
}
