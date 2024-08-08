<?php

namespace App\Models\Api\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DateTimeInterface;

class Branch extends Model
{
    use HasFactory;

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
