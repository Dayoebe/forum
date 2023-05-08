<?php

namespace App\Http\Controllers;
use DrewM\MailChimp\MailChimp;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $mailchimp = new MailChimp(env('MAILCHIMP_APIKEY'));
        $listId = env('MAILCHIMP_LIST_ID');

        $result = $mailchimp->post("lists/$listId/members", [
            'email_address' => $request->email,
            'status'        => 'subscribed',
        ]);

        if ($mailchimp->success()) {
            return redirect()->back()->with('success', 'You are now subscribed to our newsletter.');
        } else {
            return redirect()->back()->with('error', $result['detail']);
        }
    }
}
