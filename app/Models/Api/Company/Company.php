<?php

namespace App\Models\Api\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Company extends Model
{
    use HasFactory;

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d');
    }
}
