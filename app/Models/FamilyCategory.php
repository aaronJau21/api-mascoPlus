<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyCategory extends Model
{
    protected $table = 'family_categories';

    protected $fillable = ['family_id', 'category_id'];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
