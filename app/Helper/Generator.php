<?php
/**
 * Created by PhpStorm.
 * User: terry-vmi
 * Date: 7/29/2017
 * Time: 4:10 PM
 */

namespace Helper;


class Generator
{

    public static function getAccessToken(){
        return hash('sha256',
            microtime(TRUE).rand().'o8RIdg75v8usNWjmVCKOHJ4AKT2k0X0pOlv1DFKdz4Y');
    }
}