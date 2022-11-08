<?php

namespace App\Enums;
 
enum ApplicationStatusEnum:string {
    case WAITING_COMPANY = 'waiting_company';
    case WAITING_ADMIN = 'waiting_admin';
    case DOING = 'doing';
    case COMPLETED = 'completed';
}