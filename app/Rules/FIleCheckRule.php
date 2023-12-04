<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FIleCheckRule implements Rule
{
    /**
     * Run the validation rule.
     *
     */
    public $extention;
    public $type;
    public $error;
    public function __construct($extention = null,$type = null)
    {
       $this->extention = $extention;
       $this->type = $type;
    }
    public function passes($attribute, $value){
    
        $mark  = 1;
        $total = 6;
        $size  = 15000;
        
        if(is_array($value)) {

            if(count($value) > $total) {

                $this->error = "Can only upload ".$total. " Files at a Time";
                $mark        = 0;
            }
            else{
                foreach($value as $file) {

                    $bytes = $file->getSize();
                    // dd($bytes, 'first if');
                    if( round($bytes / 1024) > $size) {

                        $this->error = $this->type.' File can not exceed '.$size. 'KB';
                        $mark        = 0;
                        break;
                    }
                    elseif(!in_array($file->getClientOriginalExtension(), $this->extention)) {

                        $mark = 0;
                        $this->error = $this->type.' Must be '.implode(", ", $this->extention).' format';
                        break;
                    }
                }
            }

        }
        else{
            $bytes = $value->getSize();
            // dd($bytes, 'second if');
            if( round($bytes / 1024) > $size){
                $this->error = $this->type.' File can not exceed '.$size. 'KB';
                $mark = 0;
            }
            elseif($this->type == 'image'){
                if(!in_array($value->getClientOriginalExtension(), $this->extention)){
                    $this->error = $this->type.' Must be '.implode(", ", $this->extention).' format';
                    $mark = 0;
                }
            }
     
        }

        if( $mark == 1){
            return true;
        }
        else{
            return false;
        }

    }

    public function message()
    {
        return $this->error;
    }
}
