<?php

namespace App\Models;

trait ModelHelper
{

    # Function to get table column name 
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    

    # Funtion to get owner record - self record
    public static function ownerRecord($column = 'user_id')
    {
        return self::where($column, getUserID());
    }


    # Funtion to get Model by uid 
    public static function whereUID($uid, $withTrashed = false, $merchantData = true, $merchantColumn ='merchant_id', $uidColumn = 'uid')
    {        
        $result =  ($withTrashed)?self::withTrashed()->where($uidColumn, $uid):self::where($uidColumn, $uid);
        $result = ($merchantData)?$result->where($merchantColumn , getMerchantID())->first():$result->first();
        return ($result)?$result:null;
    }

    # Funtion to get Model by uid  - for user 
    public static function whereUserUID($uid)
    {        
        $result =  self::where('uid', $uid)->first();
        return ($result)?$result:null;
    }
    

    # Funtion to get column JSON key  
    public function getJSON($column = 'meta', $key = null, $isArray = false)
    {
        
        $json = json_decode($this->{$column}, $isArray );
        if ($key)
            return isset($json->{$key}) ? $json->{$key} : null;
        return $json ?? (object)[];
    }


    # Funtion to get Model meta 
    public function getMeta($key = null)
    {
        return $this->getJSON('meta', $key);
    }

}
