<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use App\Helpers\Helper;
use App\Eloquents\User;
use Response;
use Validator;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getStylistbySalonID(Request $request, $departmentId)
    {
        $response = Helper::apiFormat();
        $data = $this->userRepo->getStylistByDepartmentId([],['*'], $departmentId);
        $dataResponse = $data->where('permission', User::PERMISSION_MAIN_WORKER);
        if(empty($data->first()))
        {
            $response['error'] = true;
            $response['status'] = '404';
            $response['message'] = [
                'This department does not exists',
            ];

            return Response::json($response) ;
        }
        if(empty($dataResponse->first()))
        {
            $response['error'] = true;
            $response['status'] = '402';
            $response['message'] = [
                "These's no stylist in this department",
            ];
        }
        $response['data'] = $dataResponse;

        return Response::json($response) ;
    }
}
