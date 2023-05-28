<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function files():HasMany{
        return $this->hasMany(File::class);
    }
    public function groups(){
        return $this->belongsToMany(Group::class,'permissions');
    }
}
