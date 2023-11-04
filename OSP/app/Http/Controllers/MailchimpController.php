<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// https://us21.admin.mailchimp.com/
//username: wito.ds@gmail.com


class MailchimpController extends Controller
{
    //setup mailchimp api client for MARKETING (transactional for one on one emails is paid)
    static function mailchimpMarketingSetup(){
        //create a new instance of the mailchimp api client
        $mailchimp = new \MailchimpMarketing\ApiClient();

        //set the config for mailchimp --> see documentation for getting server value. Api key is defined in env file and in config/services.php and is coming from my account on mailchimp
        $mailchimp->setConfig([

            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);

        return $mailchimp;
    }

    //subscribe to newsletter --> currently only one list, but if there would be more, you could include a list_id in the request and then use that one
    public function subscribe()    {
        //get mailchimp instance with correct setup (defined above)
        $mailchimp = MailchimpController::mailchimpMarketingSetup();

        //validate the input
        request()->validate([
            'email' => 'required|email',
        ]);

        //get list_id --> this is the id of the list where you want to add the member to. in this case there is only one list, so we take the first one
        $list_id = $mailchimp->lists->getAllLists()->lists[0]->id;

        //add a member to the list -> first arg is list you want to add to, the second is an array of payload->status is subscribed since they want to subscribe. 
        //if you want a confirmation email, use 'pending'. after cnfirming they will get status 'subscribed'
        //mailchimp detects some errors like the email already exists or is gibberish, so we catch the exception and return a flash message
        try {
            $mailchimp->lists->addListMember($list_id, [
                'email_address' => request('email'),
                'status' => 'subscribed',
            ]);


        } catch (\Exception $e) {
            return back()->with('error', 'This email could not be added to our newsletter list.');
        }

        return back()->with('success', 'You are now subscribed to our newsletter!');
    }
}
