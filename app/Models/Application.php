<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ApplicationStatusEnum;

class Application extends Model
{
    use HasFactory;
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'application_details', 
        'application_status', 
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $casts = [
        'application_status' => ApplicationStatusEnum::class
    ];
}
