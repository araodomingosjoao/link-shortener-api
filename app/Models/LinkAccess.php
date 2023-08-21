<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkAccess extends Model
{
    use HasFactory;

    protected $fillable = ['link_id', 'ip', 'user_agent'];
}
