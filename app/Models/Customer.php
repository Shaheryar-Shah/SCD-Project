<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    // Relationship to subscriptions (one-to-many)
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }
}
