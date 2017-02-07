<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property string $device_id
 * @property string $current_hair
 * @property string $current_mask
 * @property string $current_body
 * @property string $current_suit
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'device_id', 'role_id', 'current_hair_id', 'current_mask_id', 'current_body_id', 'current_suit_id'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCurrentHairIdAttribute($input)
    {
        $this->attributes['current_hair_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCurrentMaskIdAttribute($input)
    {
        $this->attributes['current_mask_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCurrentBodyIdAttribute($input)
    {
        $this->attributes['current_body_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCurrentSuitIdAttribute($input)
    {
        $this->attributes['current_suit_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function current_hair()
    {
        return $this->belongsTo(Hair::class, 'current_hair_id');
    }
    
    public function current_mask()
    {
        return $this->belongsTo(Mask::class, 'current_mask_id');
    }
    
    public function current_body()
    {
        return $this->belongsTo(Body::class, 'current_body_id');
    }
    
    public function current_suit()
    {
        return $this->belongsTo(Suit::class, 'current_suit_id');
    }
    
    public function available_hairs()
    {
        return $this->belongsToMany(Hair::class, 'hair_user');
    }
    
    public function available_masks()
    {
        return $this->belongsToMany(Mask::class, 'mask_user');
    }
    
    public function available_bodies()
    {
        return $this->belongsToMany(Body::class, 'body_user');
    }
    
    public function available_suits()
    {
        return $this->belongsToMany(Suit::class, 'suit_user');
    }
    
    public function results()
    {
        return $this->belongsToMany(Result::class, 'result_user');
    }
    
}
