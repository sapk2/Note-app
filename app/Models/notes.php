<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_shared',
        'is_archived',
        'is_pinned',
    ];
    protected $casts = [
        'is_shared' => 'boolean',
        'is_archived' => 'boolean',
        'is_pinned' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
