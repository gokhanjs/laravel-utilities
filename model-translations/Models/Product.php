<?php

namespace App\Models;

use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, HasFactory, TranslationTrait;

    protected $fillable = [
        'price',
        'currency'
    ];

    protected $table = 'products';

}
