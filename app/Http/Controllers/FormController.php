<?php

namespace App\Http\Controllers;

use App\Facades\Zoho;
use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;
use Spatie\Newsletter\Drivers\MailChimpDriver;
use Spatie\Newsletter\Support\Lists;

class FormController extends Controller
{

  public function submitRequestForm(Request $request)
  {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        'phone' => ['required', 'string'],
    ]);
    $audienceId = "3a6dfd14df";
    if ($audienceId) {
        $lists = Lists::createFromConfig(array_merge_recursive_preserve(config('newsletter'), [
            'default_list_name' => 'subscribers',
            'lists' => [
                'subscribers' => [
                    'id' => $audienceId,
                ],
            ]
        ]));
        $mailchimpDriver = MailChimpDriver::make(config('newsletter.driver_arguments'), $lists);

        if ($mailchimpDriver->isSubscribed($request->email)) {
            return response()->json(['code' => 'ERROR', 'message' => __('util.subscribed-user')]);
        } else {
            $mailchimpDriver->subscribe(
                $request->email,
                [
                    'FNAME' => $request->name ?? '-',
                    'LNAME' => $request->surname ?? '-',
                    'PHONE' => $request->phone,
                    'ADDRESS' => $request->address ?? '-',
                    'COMPANY' => $request->company ?? '-',
                ]
            );
        }
    }

    return response()->json(['code' => "SUCCESS", 'redirect_url' => route('success') . '?type=request-form', 'message' => __('util.subscribed')]);
  }
}
