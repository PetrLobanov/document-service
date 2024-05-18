<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $uuid
 * @property string $name
 * @property string $descripotion
 * @property string $version_number
 * @property string $file_path
 */
class Document extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'version_number', 'file_path'];
}
