<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $guarded = []; 

    /**
     * Get all of the grade for the Jabatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
