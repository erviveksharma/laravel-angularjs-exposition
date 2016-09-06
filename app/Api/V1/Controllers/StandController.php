<?php

namespace App\Api\V1\Controllers;
use App\Stand;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use JWTAuth;
use DB;
use App\Visit;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StandController extends Controller
{
    use Helpers;
    public function index($id) {
        $stand = DB::table('stands')
            ->leftjoin('events', 'stands.event_id', '=', 'events.id')
            ->leftjoin('companies', 'stands.id', '=', 'companies.stand_id')
            ->select('events.title', 'events.id as event_id', 'stands.*', 'companies.id as company_id')
            ->where('stands.id',$id)
            ->get();
        if(!$stand)
            throw new NotFoundHttpException;
        return $stand;
    }

    public function visit(Request $request){
        $user = $this->currentUser()->toArray();

        $visit = Visit::firstOrNew(array('stand_id' => $request->get('stand_id'), 'user_id' =>$user['id']));
        $visit->save();

        /*$data = array('stand_id' => $request->get('stand_id'),
            'user_id' => $user['id'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        );
        DB::table("visits")->insert($data);*/
    }
    private function currentUser() {
        return JWTAuth::parseToken()->authenticate();
    }
}
