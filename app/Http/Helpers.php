<?php

use App\Models\Translate;


//Function to get locazliation code
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



//Custom Translate function
function translate($key, $value)
{

	# 1 : Check language & validation
    $lang= \App::getLocale();

    # 2 : Check if translate before - return data value 
    $translate = Translate::where('key',$key)->first();
    if($translate)
    {
        if ($lang == 'en')
            return $translate->value_en;
        return $translate->value_zh_CN;
    }
        
    # 3 : If didnt translate before , store key & value 
    Translate::create(['key'=>$key,'value_en'=>$value]);

    return $value;
}
