<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;
    use SoftDeletes;
    use ModelHelper;

    protected $guarded = ['id'];
    protected $hidden = ['password', 'id'];
    
    # BOOT 
    public static function boot()
    {
        parent::boot();
        self::creating(function ($user) {

            # Generate referrence UID
            $user->uid = generateReferenceKey('u_');
          
            # Check if is merchant related 
            if(\Auth::check() && checkRole(['merchant_admin']))
                $user->merchant_id = getMerchantID();
        });
    }


    # Function to check user status
    public function checkStatus($status)
    {
        return $this->status == getConfig("user.status.$status");
    }


    # Function to check user role
    public function checkRole($role)
    {
        if (is_array($role)) {
            foreach($role as $r)
            {                
                if ($this->role_id == getConfig("role.$r"))
                    return true;
            }
            return false;    
        }
        return $this->role_id == getConfig("role.$role");
    }
    

    /*************************************************
     
                    MODEL RELATIONSHIP 

    **************************************************/
     
    # Function to access merchant 
    public function merchant()
    {
        return $this->hasOne('App\Models\Merchant','id','merchant_id');
    }


}
