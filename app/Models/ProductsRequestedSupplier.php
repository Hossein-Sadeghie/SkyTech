<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsRequestedSupplier extends Model
{
    use HasFactory;

    protected $table = 'products_requested_supplier' ;
    protected $guarded = [];

    public function SupplierRequestStatus()
    {
        return $this->belongsTo(SupplierRequestStatus::class, 'supplier_request_status_id');
    }

    public function productRequestedUser()
    {
        return $this->belongsTo(ProductRequestedUser::class, 'product_requested_user_id');
    }
}
