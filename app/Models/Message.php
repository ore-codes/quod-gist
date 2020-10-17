<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function server() {
        return $this->belongsTo(Server::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
