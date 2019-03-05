<?php

namespace Joeelia\AuthorizeNet\Webhooks\CustomerEvents;


use Joeelia\AuthorizeNet\AuthorizeNet;
use DateTime;
use Carbon\Carbon;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;


class CustomerEventDispatcher
{
    public function paymentProfileCreated($eventPayload){
        $this->message("paymentProfileCreated FROM PACKAGE WORKS");
    }
    public function paymentProfileDeleted($eventPayload){
        $this->message("paymentProfileDeleted CAPTRUE FROM PACKAGE WORKS");
    }
    public function paymentProfileUpdated($eventPayload){
        $this->message("paymentProfileUpdated CAPTRUE FROM PACKAGE WORKS");
    }
    public function customerCreated($eventPayload){
        $this->message("customerCreated FROM PACKAGE WORKS");
    }
    public function customerDeleted($eventPayload){
        $this->message("customerDeleted CAPTRUE FROM PACKAGE WORKS");
    }
    public function customerUpdated($eventPayload){
        $this->message("customerUpdated CAPTRUE FROM PACKAGE WORKS");
    }

    public function message($text){
        $url1 = "https://api.telegram.org/bot545310390:AAHWO6DJCvimklYkFJKxYRbhwJwnE2HLubg/sendMessage?chat_id=-1001336256280&text=";
        $url = $url1 . $text;
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }
    

}
