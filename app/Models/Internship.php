<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Internship extends Model
{
    use HasFactory;
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

    public function user(): BelongsTo
    {
        return $this -> belongsTo(User::Class);
    }
    
    public function category(): BelongsTo
    {
        return $this -> belongsTo(InternshipCategory::class, 'internship_category_id', 'id');
    }
    protected $with = ['category', 'user'];

    public function getLinksAttribute(){
        return [
            'view' => action(
                [Internships::class, 'view'],
                $this->id
            ),
        ];
    }
}
