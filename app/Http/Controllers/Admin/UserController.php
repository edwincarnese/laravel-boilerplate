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
                    return '
                        <div class="text-center">
                            <a href="' . route('users.show', $data->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                            <a href="javascript:void(0);" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
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
        return $user;
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user) {
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
