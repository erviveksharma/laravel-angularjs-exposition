<?php

namespace App\Api\V1\Controllers;
use App\Company;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Dingo\Api\Exception\ValidationHttpException;

class CompanyController extends Controller
{
    use Helpers;
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required',
            'company_admin_email' => 'required',
            'address' =>'required',
            'phone' =>'required',
            'logo' =>'required',
        ]);

        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        if(Company::create($request->all()))
            return $this->response->created();
        else
            return $this->response->error('could_not_create_book', 500);
    }

}
