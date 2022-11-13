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
        'user_id',
        'internship_id',
    ];
    protected $touches = ['internship', 'user'];

    public function user()
    {
        return $this -> hasOne(User::class, 'id','user_id');
    }

    public function internship()
    {
        return $this -> hasOne(Internship::class, 'id', 'internship_id');
    }
}
