<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::latest()->get())
                ->addColumn('action', function($data) {
                    $user_method = [
                        "PUT", 
                        "/users/" . $data->id
                    ];

                    return '
                        <div class="text-center">
                            <a href="' . route('users.show', $data->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                            <a href="javascript:void(0);" onclick=formModalType('. json_encode($user_method) .') class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <a href="javascript:void(0);" onclick=deleteUser(' . $data->id . ') class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    ';
                })
                ->addColumn('full_name', function($data) {
                    return '<a href="' . route('users.show', $data->id) . '">' . $data->full_name . '</a>';
                })
                ->rawColumns(['action', 'full_name'])
                ->make(true);
        }

        return view('pages.admin.user.index');
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());

        return response()->json([
            'title' => 'Saved', 
            'text' => 'New user successfully saved', 
            'icon' => 'success',
        ], 201);
    }

    public function show(User $user)
    {
        return view('pages.admin.user.show', compact('user'));
    }

    public function update(UserRequest $request, $user_id)
    {
        $data = [
            'request' => $request,
            'user_id' => $user_id,
            'method' => 'update'
        ];
        return $this->isUpdateOrDestroy($data);
    }

    public function destroy($id)
    {
        $data = [
            'user_id' => $id,
            'method' => 'destroy'
        ];
        return $this->isUpdateOrDestroy($data);
    }

    private function isUpdateOrDestroy($data) {
        $user = User::find($data['user_id']);
        
        if($user && ($data['method'] == 'update' || $data['method'] == 'patch')) {
            $user->update($data['request']->validated());

            return response()->json([
                'title' => 'Updated', 
                'text' => 'User successfully updated', 
                'icon' => 'success',
            ], 200);
        }
        else if($user && $data['method'] == 'destroy') {
            $user->delete();
            
            return response()->json([
                'title' => 'Deleted', 
                'text' => 'User has been deleted', 
                'icon' => 'success'
            ], 200);
        }

        return response()->json([
            'title' => 'Failed', 
            'text' => 'User not found', 
            'icon' => 'error'
        ], 404);
    }
}
