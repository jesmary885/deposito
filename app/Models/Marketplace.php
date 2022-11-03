<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion uno a muhos inversa
    public function categoryMarketplace(){
        return $this->belongsTo(CategoryMarketplace::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos
    public function SaleMarketplaces(){
        return $this->hasMany(saleMarketplace::class);
    }

    public function comments_markets(){
        return $this->hasMany(CommentsMarket::class);
    }

}
