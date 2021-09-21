<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order_tabel';
    public $timestamps = false;

    protected $fillable = ['id_pelanggan', 'id_petugas', 'tgl_transaksi'];
}
