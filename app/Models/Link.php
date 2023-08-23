<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['original_url', 'slug', 'access_count'];

    public function link_access()
    {
        return $this->hasMany(LinkAccess::class, 'link_id', 'id');
    }
}
