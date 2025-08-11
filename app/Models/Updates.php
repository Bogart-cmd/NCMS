<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'date',
        'facebook_embed',
        'is_active'
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('assets/img/' . $this->image);
        }
        return null;
    }

    public function getFormattedDateAttribute()
    {
        return $this->date ? $this->date->format('M j, Y') : 'No date';
    }
}
