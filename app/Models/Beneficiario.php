<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'beneficiario';

    protected $fillable = ['id','nombre','rfc','estatus'];
	
}
