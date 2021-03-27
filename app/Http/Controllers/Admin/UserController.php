<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                            <a href="#" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
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

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
