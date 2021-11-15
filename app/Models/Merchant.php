<?php

namespace App\Models;

use App\Observers\MerchantObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model 
{
    use SoftDeletes;
    use ModelHelper;

    protected $table = 'merchant';
    protected $guarded = ['id'];
    protected $hidden = ['id'];


    # BOOT  
    public static function boot()
    {
        parent::boot();
        self::creating(function ($client) {
            $client->uid = generateReferenceKey('m_');            
        });

    }


    # Function to check  status
    public function checkStatus($status)
    {
        return $this->status == getConfig("merchant.status.$status");
    }



    # Function to get merchant status 
    public function getStatus(){
        return self::getTranslatedConfig('merchant.status', $this->status);
    }



    
    /*************************************************
     
                    MODEL RELATION 

    **************************************************/
         


    # Function to access merchant owner  
    public function owner()
    {  
        return User::where('merchant_id', $this->id)->where('role_id', getConfig('role.merchant_admin'))->first();
    }

    
}
