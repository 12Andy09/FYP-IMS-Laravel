<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Internship extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'job_position',
        'job_description',
        'job_requirement',
        'job_location',
        'job_duration',
        'internship_category_id',
        'company_overview',
        'user_id',
    ];
    protected $touches = ['category', 'user'];

    public function user(): BelongsTo
    {
        return $this -> belongsTo(User::Class);
    }
    
    public function category(): BelongsTo
    {
        return $this -> belongsTo(InternshipCategory::class, 'internship_category_id', 'id');
    }
    
    public function getLinksAttribute(){
        return [
            'view' => action(
                [Internships::class, 'view'],
                $this->id
            ),
        ];
    }
    
    public function toSearchableArray()
    {
        return [
            'job_position' => $this->job_position,
            'job_location' => $this->job_location,
            'company_overview' => $this->company_overview,
        ];
    }
}
