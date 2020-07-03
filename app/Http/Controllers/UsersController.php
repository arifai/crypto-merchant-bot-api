<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseBuilder;
use App\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Get users
     */
    public function index()
    {
        $result = UsersModel::simplePaginate(10);

        return ResponseBuilder::response('success', '', $result, 200);
    }

    /**
     * Get user by id
     * 
     * @param string $id
     */
    public function find($id)
    {
        $result = UsersModel::find($id);

        $msg = !is_null($result) ? '' : 'user not found';

        $status = !is_null($result) ? 'success' : 'failed';

        return ResponseBuilder::response($status, $msg, $result, 200);
    }

    /**
     * Add new user
     */
    public function add(Request $request)
    {
        $data = new UsersModel();

        $this->validate($request, [
            'tele_chat_id' => 'required|unique:users',
            'firstname' => 'required',
            'email' => 'email|unique:users',
        ]);

        $data->tele_chat_id = $request->input('tele_chat_id');
        $data->firstname = $request->input('firstname');
        $data->lastname = $request->input('lastname');
        $data->username = $request->input('username');
        $data->email = $request->input('email');
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
     * Update user by id
     * 
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $user = UsersModel::find($id);

        $this->validate($request, [
            'email' => 'email|required',
            'firstname' => 'required'
        ]);

        if ($user) {
            $user->update($request->all());

            return ResponseBuilder::response('success', 'user successfully updated', $user, 200);
        }

        return ResponseBuilder::response('failed', 'user not found', null, 200);
    }

    /**
     * Delete user by id
     * 
     * @param int $id
     */
    public function delete($id)
    {
        $data = UsersModel::find($id);

        if (!$data) {
            return ResponseBuilder::response('failed', 'user not found', null, 200);
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
