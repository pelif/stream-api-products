<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasUuids, HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'user_id',
    ];

    public $incrementing = false;

    protected $KeyType = 'string';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $deleteCascade = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
