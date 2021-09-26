<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'ahli_baru',
    // ];

    public function kodKawasan(){

        return $this->belongsTo(KodKawasan::class,'kod_kawasans_id');
    }
}
