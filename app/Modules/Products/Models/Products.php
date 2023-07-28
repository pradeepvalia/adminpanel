<?php

namespace App\Modules\Products\Models;

use App\Modules\Stores\Models\Stores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table='product';

    public function Store()
    {
        return $this->belongsTo(Stores::class,'store_id','id');
    }
}
