<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
