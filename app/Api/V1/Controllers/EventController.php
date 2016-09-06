<?php

namespace App\Api\V1\Controllers;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventController extends Controller
{
    use Helpers;
    public function index() {
        return Event::all()->toArray();
    }
    public function show($id)
    {
        $event = DB::table('events')
            ->leftjoin('stands', 'events.id', '=', 'stands.event_id')
            ->leftjoin('companies', 'stands.id', '=', 'companies.stand_id')
            ->select('events.title', 'stands.*', 'companies.id as company_id', 'companies.email',
                'companies.address' ,'companies.phone' ,'companies.logo', 'companies.documents')
            ->where('stands.event_id',$id)
            ->orderBy('stands.id','asc')
            ->get();
        if(!$event)
            throw new NotFoundHttpException;
        return $event;
    }
}
