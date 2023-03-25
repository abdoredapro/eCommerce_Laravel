<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function Division() {
        return $this->belongsTo(Division::class,'division_id');
    }
    public function District() {
        return $this->belongsTo(District::class,'district_id');
    }
}
