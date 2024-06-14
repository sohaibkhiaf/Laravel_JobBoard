<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "location", "salary", "experience", "category"];

    public static array $experience = ['Entry' , 'Intermediate' , 'Senior'];
    public static array $category = ['IT' , 'Finance' , 'Sales' , 'Marketing'];

    public function employer() :BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }


    public function jobApplications() : HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public static function scopeFilter(Builder $query, array $filters) : Builder
    {
        return $query->when($filters['search'] ?? null , function($query , $search){
            $query->where(function ($query) use ($search){
                $query->where('title','like','%'.$search.'%')
                ->orWhere('description','like','%'.$search.'%')
                ->orWhereHas('employer', function ($query) use ($search){
                    $query->where('company_name' , 'like','%'.$search.'%');
                });
            });
        })->when( $filters['min_salary'] ?? null , function($query , $minSalary){
            $query->where('salary','>=', $minSalary );
        })->when($filters['max_salary'] ?? null, function($query, $maxSalary){
            $query->where('salary','<=', $maxSalary );
        })->when($filters['experience'] ?? null, function($query , $experience){
            $query->where('experience', $experience );
        })->when($filters['category'] ?? null , function($query , $category){
            $query->where('category', $category );
        });
    }


    public function hasNotApplied(User $user) : bool
    {
        return !$this->where('id' , $this->id)
            ->whereHas('jobApplications',fn($query) => $query->where('user_id' , '=' , $user->id ?? $user) )
            ->exists();
    }
}
