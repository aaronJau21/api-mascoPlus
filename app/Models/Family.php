<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    protected $table = 'families';
    protected $fillable = ['name', 'slug', 'active'];

    public function familyCategories(): HasMany
    {
        return $this->hasMany(FamilyCategory::class, 'family_id');
    }

}
