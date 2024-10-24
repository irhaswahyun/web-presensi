<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'email'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function presensi(){
        return $this->hasMany(presensi::class);
    }
}
