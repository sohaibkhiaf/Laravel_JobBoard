<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'work_id' , 'cv_path'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function work() : BelongsTo
    {
        return $this->belongsTo(Work::class);
    }
}
