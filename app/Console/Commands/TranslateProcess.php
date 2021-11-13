<?php

namespace App\Console\Commands;

use App\Models\Translate;
use Illuminate\Console\Command;

class TranslateProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run translate function in current project';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         # 1 : Retrieve all the translate at controller file 
         exec("find app/Http/Controllers/ -type f -print0 | xargs -0 grep -h -o -P '(?<=translate\().*?(?=\))'", $output);

         # 2 : Retrieve all the translate at view file
         exec("find resources/views/ -type f -print0 | xargs -0 grep -h -o -P '(?<=translate\().*?(?=\))'", $output2);
 
         # 3 : Merge result & remove duplicate
         $output = array_merge($output2); 
         $output = array_unique($output);

         # 4 : Loop through array and create translate
         foreach($output as $translate)
         {
             $content =  explode(",", $translate,2);
             $key = substr($content[0], 1, -1);
             $val = (isset($content[1]))?substr($content[1], 1, -1):'???';
             $translate = Translate::where('key', $key)->first();
             if(!$translate)
             {
                 Translate::create([
                     'key' => $key,
                     'value_en' => $val
                 ]);
             }
         }
    }
}
