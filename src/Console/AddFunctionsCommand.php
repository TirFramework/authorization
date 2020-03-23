<?php 

namespace Tir\Profile\Console;

use Illuminate\Console\Command;

class AddFunctionsCommand extends Command 
{
    protected $signature = 'profile:add:functions';

    protected $description = 'Add Profile functions to other models';

    public function handle()
    {
            $filename = base_path('/vendor/tir/user/src/Models/User.php');
            $search = "//insert trait here";
            $insert = '    use \Tir\Profile\Traits\UserTrait;';
            $replace = $search. "\n". $insert;
            if(strpos(file_get_contents($filename), $insert)){
                echo "Profile's functions already added";
            }else{        
                $result= file_put_contents($filename, str_replace($search, $replace, file_get_contents($filename)));
                echo "Profile's functions added successfully";
            }

    }
}


