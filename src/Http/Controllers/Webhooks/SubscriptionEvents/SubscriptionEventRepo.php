<?php

namespace Joeelia\AuthorizeNet\Webhooks\SubscriptionEvents;


use Joeelia\AuthorizeNet\AuthorizeNet;
use DateTime;
use Carbon\Carbon;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;


class SubscriptionEventRepo
{
    public function created($eventPayload){
        $this->message("created subscription works!!");
        /*
        {  
            "notificationId":"43593773-f0c0-4540-afea-698a9ee7fac4",
            "eventType":"net.authorize.customer.subscription.created",
            "eventDate":"2019-03-05T05:15:34.8600996Z",
            "webhookId":"e472be90-f6c9-429f-a2f7-58ac825b5043",
            "payload":{  
                "name":"Sample Subscription",
                "amount":55961,
                "status":"active",
                "profile":{  
                    "customerProfileId":1918246648,
                    "customerPaymentProfileId":1831362174,
                    "customerShippingAddressId":1875474275
                },
                "entityName":"subscription",
                "id":"5658870"
            }
        }
        */
    }

    public function cancelled($eventPayload){
        $this->message("cancelledsubscription works!!");
    }

    public function expiring($eventPayload){
        $this->message("expiring  subscription works!!");
    }

    public function suspended($eventPayload){
        $this->message("suspended subscription works!!");
    }

    public function terminated($eventPayload){
        $this->message("terminated subscription works!!");
    }

    public function updated($eventPayload){
        $this->message("updated subscription works!!");
    }

    public function webhookSubscriptionControl($eventPayload,$subscriptionEvents)
    {
        $amount = $eventPayload['payload']['amount'];
        $transactionId = $eventPayload['payload']['id'];
        $subscriptionName = $eventPayload['payload']['name'];
        $subscriptionStatus = $eventPayload['payload']['status'];
        $customerProfileId = $eventPayload['payload']['profile']['customerProfileId'];
        $customerPaymentProfileId = $eventPayload['payload']['profile']['customerPaymentProfileId'];
        $customerShippingAddressId =$eventPayload['payload']['profile']['customerShippingAddressId'];

        if ($subscriptionStatus != "active"){
            //Subscription is NOT ACTIVE!
            $this->message("Subscription is ". $subscriptionStatus . " for customerProfileId: ".$customerProfileId.". They WERE paying $".$amount);
            //OOOP
        } elseif ($subscriptionStatus = "active") {
            //Subscription IS ACTIVE!
            $this->message("Subscription is ". $subscriptionStatus . " for customerProfileId: ".$customerProfileId.". They are paying $".$amount. "a month!");
            $things="subscription things";
            return $things;
        } else{
            $this->message("Subscription is ". $subscriptionStatus . " for customerProfileId: ".$customerProfileId);
        }
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
