<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailsFactureTva extends Model
{
    public function produit(){
        return $this->belongsTo(Product::class , 'produit_id' , 'id');
    }
}
