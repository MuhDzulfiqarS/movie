<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemens';
    protected $guarded = [];  

    /**
     * Get all of the karyawan for the Departemen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class);
    }
}