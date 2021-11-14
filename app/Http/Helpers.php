<?php

use Illuminate\Encryption\Encrypter;


/**************************************************

            USER & MERCHANT RELATED

 **************************************************/


#Function to get user role name
function getUserRoleName()
{
    return array_flip(getConfig('role'))[Auth::user()->role_id];
}


# Check user role function
function checkRole($role)
{
    return (Auth::check())?Auth::user()->checkRole($role):false;
}


# Function to get user ID 
function getUserID()
{   
    return ($user = Auth::user())?$user->id : null;
}

# Function to get user point
function getUserPoint()
{   
    return  ($user = Auth::user())?$user->point : 0;
}


# Function to get user UID 
function getUserUID()
{
    return Auth::check()?Auth::user()->uid:null;
}


# Function to get merchant 
function getMerchant()
{
    # Check if user already login or user is merchant 
    if(Auth::check() && Auth::user()->checkRole(['merchant_admin']))
        return Auth::user()->merchant;
}



    
/**************************************************

                GLOBAL FUNCTION

 **************************************************/


 
# Function to get locazliation code
function getSupportedLocalesNative()
{
    $arr = [];
    foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    {
        $arr_list = [LaravelLocalization::getLocalizedURL($localeCode, null, [], true)=>$properties['native']];
        $arr= array_merge((array)$arr,(array)$arr_list);
    }
    return $arr;
}



# Function to check if amount is valid 
function validateAmount($amount)
{   
    return is_numeric($amount) && $amount > 0;
}


# Function to get system config
function getConfig($config)
{   
    return config("system.$config");
}

//Function to set meta
function setMeta($meta, $key, $value, $ignoreExistingKey = false)
{
    if (!$meta)
        $meta = (object) array();

    //Ignore existing key
    if ($ignoreExistingKey) {
        if (isset($meta->{$key}))
            return $meta;
    }


    $meta->{$key} = $value;
    return $meta;
}


#  Function to format date
function formatDate($date, $format ='Y-m-d H:i A')
{
    return \Carbon\Carbon::parse($date)->format($format);
}


//Function to filter start date
function getFilterStartDate($date)
{
    $startDate = date($date);
    if (!$startDate)
        $startDate = date("1000-01-01 00:00:00");
    return $startDate;
}


//Function to filter end date
function getFilterEndDate($date)
{
    $endDate =  date('Y-m-d', strtotime('+1 day', strtotime($date)));
    if (!$date)
        $endDate = date("9999-12-31 23:59:59");
    return $endDate;
}



//Simple encryption
function simpleEncryption($key)
{
    $cipher = "AES-128-ECB";    
    return base64_encode(openssl_encrypt($key,$cipher,env('PASS_KEY')));    
}

//Simple descryption
function simpleDecryption($key)
{
    $key = str_replace(' ','',$key);
    $cipher = "AES-128-ECB";        
    return openssl_decrypt(base64_decode($key),$cipher,env('PASS_KEY'));    
}


//Custom encryption
function customEncryption($key)
{
    $encrypt = new Encrypter(env('PASS_KEY'), 'AES-128-CBC');
    return $encrypt->encrypt($key);
}



//Custom decryption
function customDecryption($key, $id = null)
{
    try {
        $decrypt = new Encrypter(env('PASS_KEY'), 'AES-128-CBC');
        $decrypt = $decrypt->decrypt($key);
        if ($id)
            return explode("$id", $decrypt)[1];
        return $decrypt;
    } catch (\Exception $e) {
        abort(404);
    }
}


//Function to filter mouney amount
function filterNumber($num)
{
    return number_format(floatval($num), 2, '.', ',');
}


//Function to generate reference key
function generateReferenceKey($key='')
{
    return $key . \Ramsey\Uuid\Uuid::uuid4()->toString();
}


//Function to get $_GET value
function requestInput($key)
{
    return request()->input($key);
}


#  Function to check nav active 
function isNavActive($routeArray)
{

    # 0 : Get current route name
    $requestRoute = Request::route()->getName();

    # 1 : Loop route and check if got wildcard
    foreach ($routeArray as $route) {
        if (strpos($route, "*") !== false) {
            $checkRoute = explode('.*', $route);
            if (strpos($requestRoute, $checkRoute[0]) !== false)
                return true;
        }
    }

    # 2 : Check if in array 
    return in_array($requestRoute, $routeArray);
}

# Function to get random color code
function randColorCode() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}