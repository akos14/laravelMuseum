<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'item_id', 'author_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
