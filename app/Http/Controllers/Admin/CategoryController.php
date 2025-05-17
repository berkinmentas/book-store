<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function datatable()
    {
        try {
            $model = Category::query()->select(['id', 'title', 'created_at', 'updated_at']);

            return DataTables::eloquent($model)
                ->addColumn('actions', function (Category $category) {
                    $editUrl = htmlspecialchars(route('admin.categories.edit', ['category' => $category->id]), ENT_QUOTES, 'UTF-8');
                    $deleteUrl = htmlspecialchars(route('admin.categories.destroy', ['category' => $category->id]), ENT_QUOTES, 'UTF-8');

                    $action = '<a class="text-blue-600 hover:text-blue-800 underline mr-3" href="' . $editUrl . '">' . __('Görüntüle') . '</a>';
                    $action .= '<button data-id="' . $category->id . '" data-url="' . $deleteUrl . '" class="text-red-600 hover:text-red-800 underline btn-delete">' . __('Sil') . '</button>';

                    return $action;
                })
                ->addColumn('created_at_formatted', function (Category $category) {
                    return $category->created_at->format('d.m.Y H:i');
                })
                ->escapeColumns(['title'])
                ->rawColumns(['actions'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('Category datatable error: ' . $e->getMessage());
            return response()->json(['error' => 'Veri listelenirken bir hata oluştu.'], 500);
        }
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:categories',
        ]);

        DB::beginTransaction();

        try {
            Category::create([
                'title' => $request->input('title'),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('Kategori başarıyla oluşturuldu.'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category creation error: ' . $e->getMessage());

            throw ValidationException::withMessages([
                'error' => __('Kategori oluşturulurken bir hata oluştu.')
            ]);
        }
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:categories',
        ]);

        DB::beginTransaction();

        try {
            $category->update([
                'title' => $request->input('title'),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('Kategori başarıyla güncellendi.'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category update error: ' . $e->getMessage());

            throw ValidationException::withMessages([
                'error' => __('Kategori güncellenirken bir hata oluştu.')
            ]);
        }
    }

    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {
            $category->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('Kategori başarıyla silindi.'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category deletion error: ' . $e->getMessage());

            throw ValidationException::withMessages([
                'error' => __('Kategori silinirken bir hata oluştu.')
            ]);
        }
    }
}
