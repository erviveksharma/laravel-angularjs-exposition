<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use DB;

class CompanyController extends Controller
{

    public function reports(){
        $reports = DB::table('companies')
            ->leftjoin('stands', 'companies.stand_id', '=', 'stands.id')
            ->leftjoin('events', 'stands.event_id', '=', 'events.id')
            ->leftjoin('visits', 'stands.id', '=', 'visits.stand_id')
            ->leftjoin('users', 'visits.user_id', '=', 'users.id')
            ->select('companies.company_admin_email as company_email', 'stands.code as stand_code', 'events.title as event_title',
                'events.end_date as event_end_date', 'users.name as user_name', 'users.email as user_email'
            )
            ->where('visits.stand_id', '!=', null)
            ->where('events.end_date', '<', date('Y-m-d H:i:s'))
            ->get();
        if (!$reports)
            throw new NotFoundHttpException;

        $companies = array();
        foreach($reports as $report){
            $companies[$report->company_email][]= $report;
        }

        if(!empty($companies)){
            foreach($companies as $email => $company ){
               Mail::send('emails.report', compact('company'), function ($message) use ($email) {

                    $message->from(getenv('MAIL_USERNAME'), 'Event Reports');

                    $message->to($email)->subject('Virtual exposition application event stand visitor report');

                });

            }
        }

        return "Reports have been sent successfully";
    }
}
