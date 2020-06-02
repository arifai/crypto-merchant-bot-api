<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseBuilder;
use App\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get users
     */
    public function index()
    {
        $result = UsersModel::simplePaginate(10);

        return ResponseBuilder::response('success', '', $result, 200);
    }

    /**
     * Get user by email
     * 
     * @param string $email
     */
    public function findByEmail(Request $request)
    {
        $email = $request->input('email');

        $result = UsersModel::where(['email' => $email])->first();

        if (!$result) {
            return ResponseBuilder::response('failed', 'email not found', null, 404);
        }

        return ResponseBuilder::response('success', '', $result, 200);
    }

    /**
     * Add new user
     */
    public function add(Request $request)
    {
        $data = new UsersModel();

        $this->validate($request, [
            'chat_id' => 'required',
            'firstname' => 'required'
        ]);

        $data->chat_id = $request->input('chat_id');
        $data->firstname = $request->input('firstname');
        $data->lastname = $request->input('lastname');
        $data->username = $request->input('username');
        $data->balance = $request->input('balance', 0);
        $data->point = $request->input('point', 0);
        $data->is_active = $request->input('is_active', false);

        if ($data) {
            $data->save();
            return ResponseBuilder::response('success', 'user successfully added', $data, 201);
        } else {
            return $data;
        }
    }

    /**
     * Update user by email
     * 
     * @param string $email
     */
    public function update(Request $request)
    {
        $email = $request->input('email');

        $user = UsersModel::where('email', $email)->first();

        if ($user) {
            $user->update($request->all());

            return ResponseBuilder::response('success', 'user successfully updated', $user, 200);
        }

        return ResponseBuilder::response('failed', 'email not found', null, 404);
    }

    /**
     * Delete user by email
     * 
     * @param string $email
     */
    public function delete(Request $request)
    {
        $email = $request->input('email');

        $data = UsersModel::where('email', $email)->first();

        if (!$data) {
            return ResponseBuilder::response('failed', 'email not found', null, 404);
        }

        $data->delete();
        return ResponseBuilder::response('success', 'user successfully deleted', null, 200);
    }

    /**
     * Count all users
     */
    public function count()
    {
        $users = UsersModel::count();

        return ResponseBuilder::response('success', '', $users, 200);
    }

    /**
     * Count users status
     */
    public function countStatus()
    {
        $active = UsersModel::where(['is_activated' => true])->count();
        $notActive = UsersModel::where(['is_activated' => false])->count();

        return ResponseBuilder::responseStatusCount('success', '', $active, $notActive, 200);
    }
}
