<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'nama',
    'umur',
    'jenis_kelamin',
    'status_mahasiswa',
    'status_nikah',
    'ips1',
    'ips2',
    'ips3',
    'ips4',
    'ips5',
    'ips6',
    'ips7',
    'ips8',
    'ipk',
    'status_kelulusan',
    'validated',
  ];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];
}
