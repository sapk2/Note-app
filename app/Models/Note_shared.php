<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note_shared extends Model
{
   use HasFactory;
   protected $fillable=[
    'note_id',
    'user_id',
    'acess_type'
   ];
   public function note()
{
    return $this->belongsTo(notes::class, 'note_id');
}
public function user()
{
    return $this->belongsTo(User::class);
}

}
