<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Localization
 *
 * @package App
 * @property string $abbreviation
 * @property string $name
 * @property tinyInteger $is_active
 * @property string $language_file
*/
class Localization extends Model
{
    protected $fillable = ['abbreviation', 'name', 'is_active', 'language_file'];
    
    
}
