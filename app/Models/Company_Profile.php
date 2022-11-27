<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Profile extends Model
{
        use HasFactory;
        protected $table = 'company_profile';
        protected $primaryKey = 'user_id';
        public $incrementing = false;

        protected $fillable = [
                'company_overview',
                'company_whyJoin',
                'company_address',
                'address_lat',
                'address_lon',
                'company_photo',
        ];
}
