<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    public function kelas(): BelongsTo
    {
        return $this->BelongsTo(Kelas::class);
    }

    public function jurusan(): BelongsTo{
        return $this->BelongsTo(Jurusan::class);
    }
    use HasFactory;
}
