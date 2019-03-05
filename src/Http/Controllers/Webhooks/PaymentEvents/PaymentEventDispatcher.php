<?php

namespace Joeelia\AuthorizeNet\Webhooks\PaymentEvents;


use Joeelia\AuthorizeNet\AuthorizeNet;
use DateTime;
use Carbon\Carbon;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;


class PaymentEventDispatcher
{
    public function authcapture($eventPayload){
        $this->message("AUTH CAPTRUE FROM PACKAGE WORKS");
            /*
            {  
                "notificationId":"47b309dd-92f5-4f45-8b09-db7c32bed2bc",
                "eventType":"net.authorize.customer.paymentProfile.created",
                "eventDate":"2019-03-05T03:31:35.0643537Z",
                "webhookId":"e472be90-f6c9-429f-a2f7-58ac825b5043",
                "payload":{  
                    "customerProfileId":1918246097,
                    "customerType":"individual",
                    "entityName":"customerPaymentProfile",
                    "id":"1831361634"
                }
            }
            */
    }
    public function authorization($eventPayload){
        $this->message("authorization FROM PACKAGE WORKS");
    }
    public function capture($eventPayload){
        $this->message("capture FROM PACKAGE WORKS");
    }
    public function priorAuthCapture($eventPayload){
        $this->message("priorAuthCapture FROM PACKAGE WORKS");
    }
    public function refund($eventPayload){
        $this->message("refund FROM PACKAGE WORKS");
    }
    public function void($eventPayload){
        $this->message("void FROM PACKAGE WORKS");
    }

    public function fraud($eventPayload){
        //approved
        //declined
        //held
        $this->message("FRAUD FROM PACKAGE WORKS");
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
