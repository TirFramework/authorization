<?php 

namespace Tir\Profile\Console;

use Illuminate\Console\Command;

class RemoveFunctionsCommand extends Command 
{
    protected $signature = 'profile:remove:functions';

    protected $description = 'Remove Profile helper function to other models';

    public function handle()
    {
            $filename = base_path('/vendor/tir/user/src/Models/User.php');
            $search = '    use \Tir\Profile\Traits\UserTrait;';
            $replace = '';
            if(strpos(file_get_contents($filename), $search)){
                $result= file_put_contents($filename, str_replace($search, $replace, file_get_contents($filename)));
                echo "Profile's functions removed successfully";
            }else{        
                echo "There is no profile's function to remove";
            }

    }
}


