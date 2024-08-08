<?php

namespace App\Models\Api\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DateTimeInterface;

class Employee extends Model
{
    use HasFactory;

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function getRelationshipKeys(): array
    {
        return [
            'branch_id',
            'position_id'
        ];
    }


    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d');
    }

}
