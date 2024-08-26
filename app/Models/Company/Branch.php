<?php

namespace App\Models\Company;

use App\Traits\App\GetFormParamaters;
use App\Traits\Database\AddFieldsCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory, AddFieldsCreatedByAndUpdatedBy, GetFormParamaters;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'address',
        'city',
        'state',
        'postal_code'
    ];


    public function getRelationshipColumns(): array
    {
        return [
            'company_id' => Company::select('id', 'name')->pluck('name', 'id')
            // 'company_id' => ['1' => 'SAGAJI', '2' => 'region']
        ];
    }
}
