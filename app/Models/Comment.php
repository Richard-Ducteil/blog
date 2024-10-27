<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $fillable = ['content', 'post_id','user_id'];

    public function user(): Belongsto
    {
        return $this->belongsTo(User::class);
    }
}
