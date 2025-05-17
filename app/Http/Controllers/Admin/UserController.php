<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function datatable()
    {
        try {
            $model = User::query()->select(['id', 'name', 'email', 'created_at', 'updated_at']);

            return DataTables::eloquent($model)
                ->addColumn('created_at_formatted', function (User $user) {
                    return $user->created_at->format('d.m.Y H:i');
                })
                ->escapeColumns(['title'])
                ->rawColumns(['name','email'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('User datatable error: ' . $e->getMessage());
            return response()->json(['error' => 'Veri listelenirken bir hata oluştu.'], 500);
        }
    }
}
