<?php
/**
 * Created by PhpStorm.
 * User: terry-vmi
 * Date: 7/29/2017
 * Time: 12:55 PM
 */

namespace Helper;


class ResponseHelper
{
    protected $payload = array(
        'status' => 'success',
    );
    protected $code, $status, $data, $message;

    public static function prepareResponsePayload($code = 200, $message, array $data = []){
        $payloadObj = new static;
        $payloadObj->code = $code;
        $payloadObj->data = $data;
        $payloadObj->message = $message;

        switch ($payloadObj->code){
            case 401:
                $payloadObj->payload['status'] = 'Fail: Unauthorised';
                break;
            case 201:
                $payloadObj->payload['status'] = 'Fail: Validation';
                break;
            case 500:
                $payloadObj->payload['status'] = 'Fail: Exception';
                break;
        }

        if($payloadObj->message != ''){
            $payloadObj->payload['message'] = $payloadObj->message;
        }

        if(count($payloadObj->data) > 0){
            $payloadObj->payload['data'] = $payloadObj->data;
        }

        return $payloadObj->payload;

    }
}