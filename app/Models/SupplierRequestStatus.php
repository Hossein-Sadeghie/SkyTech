<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierRequestStatus extends Model
{
    use HasFactory;
    protected $table = 'supplier_request_status' ;
    protected $guarded = [] ;

    public function productsRequestedSupplier()
    {
        return $this->hasMany(ProductRequestedUser::class, 'products_requested_supplier_id');
    }


}
