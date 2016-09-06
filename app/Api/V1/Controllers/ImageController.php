<?php

namespace App\Api\V1\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ImageController extends Controller
{
    /**
     * Store an image.
     *
     * @return simple JSON response message
     */
    public function store(Request $r)
    {
        $image = Input::file('file');
        /*$validator = Validator::make([$image], ['image' => 'required']);
        if ($validator->fails()) {
            return $this->errors(['message' => 'Not an image.', 'code' => 400]);
        }*/
        $destinationPath = public_path() . '/uploads';
        if(!$image->move($destinationPath, $image->getClientOriginalName())) {
            return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        }
        return response()->json(['success' => true], 200);
    }
}
