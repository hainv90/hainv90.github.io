<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Http\Resources\UserCollection;

class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
    	$this->userRepository = $userRepository;
    }
    public function index()
    {
    	try {
    		return new UserCollection($this->userRepository->getAll());
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }
    public function show($id)
    {
    	try {
    		return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $this->userRepository->find($id)
            ]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }
    public function store(UserRequest $request)
    {
        // TH đki chưa verify thì email đó vẫn đc đki tiếp
    	try {
    		$input = $request->only(['name' , 'email', 'phone', 'gender', 'password', 'address']);
            // Tìm xem đã tạo user này chưa.
            $user = $this->userRepository->findByEmail($request->email);
            // Không có user là tạo mới, nếu có thì trả về user và báo lỗi user đã đăng kí
            $result = !$user ? $this->userRepository->save($input) : $user;
    		return response()->json([
                'status' => true,
                'code'   => 200,
                'data'   =>$result,
            ]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }

    public function update(UserRequest $request, $id)
    {
        // sửa phải b' userId, để validate ko cho nhập email của user # kể cả email chưa verify
        // Query để ko sửa gì mà ko bị validate unique chính nó
    	try {
    		$input = $request->only(['name' , 'email', 'phone', 'gender', 'password', 'address']);
    		return response()->json([
                'status' => true,
                'code'   => 200,
                'data'   => $this->userRepository->save($input, $id),
            ]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }

    public function destroy($id)
    {
        try {
            return response()->json([
                'status' => true,
                'code'   => 200,
                'data'   => $this->userRepository->destroy([$id]),
            ]);
        } catch(\Exception $e) {
            return $this->systemErrors($e);
        }
    }

}
