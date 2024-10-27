<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawans';
    protected $guarded = [];   

    /**
     * Get the departemen that owns the Karyawan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }
}
