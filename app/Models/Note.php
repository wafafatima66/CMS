<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'folder_id',
        'user_id',
        'title'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function folder()
    {
      return $this->belongsTo(Folder::class);
    }
}
