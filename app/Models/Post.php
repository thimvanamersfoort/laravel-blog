<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // Primary key info
  protected $primaryKey = 'postId';
  protected $keyType = 'string';
  public $incrementing = false;


}
