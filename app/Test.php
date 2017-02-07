<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @package App
 * @property string $name_en
 * @property string $name_da
 * @property string $group
*/
class Test extends Model
{
    protected $fillable = ['name_en', 'name_da', 'group'];
    
    
}
