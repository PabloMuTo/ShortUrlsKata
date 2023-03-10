<?php

namespace Src\Domain\Validation;

class TokenValidation
{
    /**
     * Validación de Token según reglas de negocio (DOMAIN)
     * @param string $token
     * @return bool
     */
    public function execute(string $token): bool
    {
        if ( !$token ) {
            return false;
        }
        $process_arr = array();
        $s_arr = str_split($token);
        foreach($s_arr as $i){
            switch($i){
                case '(':
                    array_push($process_arr,')');
                    break;
                case '{':
                    array_push($process_arr,'}');
                    break;
                case '[':
                    array_push($process_arr,']');
                    break;
                default:
                    if(empty($process_arr) || $i != $process_arr[count($process_arr)-1]){
                        return false;
                    }else{
                        array_pop($process_arr);
                    }
                    break;
            }
        }
        return count($process_arr)==0;
    }
}
