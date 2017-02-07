<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mask
 *
 * @package App
 * @property string $image
 * @property integer $price
 * @property tinyInteger $available_as_default
*/
class Mask extends Model
{
    protected $fillable = ['image', 'price', 'available_as_default'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }
    
}
