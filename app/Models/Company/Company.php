<?php

namespace App\Models\Company;

use App\Traits\App\GetFormParamaters;
use App\Traits\Database\AddFieldsCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory, AddFieldsCreatedByAndUpdatedBy, GetFormParamaters;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'business_name',
        'address',
        'city',
        'state',
        'postal_code'
    ];
}
