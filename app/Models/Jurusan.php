<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    public function kelas() :HasMany
    {
        return $this->Hasmany(Kelas::class);
    }

    public function siswa() : HasMany
    {
        return $this->HasMany(Siswa::class);
    }
    use HasFactory;
}
