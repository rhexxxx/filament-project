<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $table = "kelas";
    public function siswa() :HasMany
    {
        return $this->HasMany(Siswa::class);
    }

    public function guru() :BelongsTo{
        return $this->BelongsTo(Guru::class);
    }

    public function jurusan() :BelongsTo
    {
        return $this->BelongsTo(Jurusan::class);
    }
    use HasFactory;
}
