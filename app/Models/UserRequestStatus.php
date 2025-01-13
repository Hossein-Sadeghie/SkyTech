<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequestStatus extends Model
{
    use HasFactory;

    protected $table = 'user_request_status';
    protected $guarded = [] ;

    public function productRequestsUser()
    {
        return $this->hasMany(ProductRequestedUser::class, 'user_request_status_id' );
    }

}
