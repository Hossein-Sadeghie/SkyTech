<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequestedUser extends Model
{
    use HasFactory;

    protected $table ='products_requested_users';
    protected $guarded= [];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userRequestStatus()
    {
        return $this->belongsTo(UserRequestStatus::class, 'user_request_status_id' );
    }



}
