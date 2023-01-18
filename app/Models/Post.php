<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','user_id','section_part','content', 'deadline_at', 'music_file'];
    
    // この投稿を所有するユーザ
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
