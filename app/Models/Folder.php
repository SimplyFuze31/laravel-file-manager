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
    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }
    protected static function booted () {
        static::deleting(function(Folder $folder) { // before delete() method call this
             $folder->files()->delete();
             $folder->children()->delete();
             // do the rest of the cleanup...
        });
    }
}
