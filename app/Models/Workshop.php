<?php

namespace App\Models;

use App\Models\PendaftaranWorkshop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workshop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pendaftaran_workshop()
    {
        return $this->hasMany(PendaftaranWorkshop::class);
    }

}
