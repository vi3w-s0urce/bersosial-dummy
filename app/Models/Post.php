<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;


class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */
    protected $fillable = [
        'post_content',
        'user_id',
        'image',
    ];

    protected $with = ['user', 'comment'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('post_content', 'like', '%' . request('search') . '%')
            ->orWhereHas(
				'User',
				fn (Builder $query) => $query->where('username', 'like', '%' . request('search') . '%')
                                        ->orWhere('name', 'like', '%' . request('search') . '%')
            );
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}