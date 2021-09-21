<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail_tabel';
    public $timestamps = false;

    protected $fillable = ['id_transaksi', 'id_produk', 'qty', 'subtotal'];
}
