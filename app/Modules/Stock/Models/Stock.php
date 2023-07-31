<?php

namespace App\Modules\Stock\Models;

use App\Modules\Products\Models\Products;
use App\Modules\Stores\Models\Stores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table='stock';

    public function Products()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
    public function Store()
    {
        return $this->belongsTo(Stores::class,'store_id','id');
    }

}
