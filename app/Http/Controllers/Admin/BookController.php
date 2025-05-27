<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreRequest;
use App\Http\Requests\Admin\Book\UpdateRequest;
use App\Models\Book;
use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.books.index');
    }

    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable(Request $request)
    {
        try {
            $model = Book::query()->where('user_id', auth()->id())->select([
                'id',
                'title',
                'category_id',
                'author',
                'publisher',
                'price',
                'created_at',
                'updated_at'
            ]);

            return DataTables::eloquent($model)
                ->addColumn('actions', function(Book $book) {
                    // XSS koruması için htmlspecialchars ekledim.
                    $editUrl = htmlspecialchars(route('admin.books.edit', ['book' => $book->id]), ENT_QUOTES, 'UTF-8');
                    $deleteUrl = htmlspecialchars(route('admin.books.destroy', ['book' => $book->id]), ENT_QUOTES, 'UTF-8');

                    $action = '<a class="text-blue-600 hover:text-blue-800 underline mr-3" href="'.$editUrl.'">'.__('Görüntüle').'</a>';
                    $action .= '<button data-id="' . $book->id . '" data-url="' . $deleteUrl . '" class="text-red-600 hover:text-red-800 underline btn-delete">'.__('Sil').'</button>';

                    return $action;
                })
                ->addColumn('price_formatted', function(Book $book) {
                    return number_format((float)$book->price, 2, ',', '.') . ' ₺';
                })
                ->addColumn('created_at_formatted', function(Book $book) {
                    return $book->created_at->format('d.m.Y H:i');
                })
                ->editColumn('category_id', function(Book $book) {
                    return $book->category->title;
                })
                ->escapeColumns(['title', 'category_id', 'author', 'publisher']) // XSS koruması için
                ->rawColumns(['actions'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('Book datatable error: ' . $e->getMessage());
            return response()->json(['error' => 'Veri listelenirken bir hata oluştu.'], 500);
        }
    }

    /**
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create',[
            'categories' => $categories
        ]);
    }

    /**
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            $book = Book::create([
                'title' => $validated['title'],
                'user_id' => auth()->id(),
                'category_id' => $validated['category_id'],
                'author' => $validated['author'] ?? null,
                'publisher' => $validated['publisher'] ?? null,
                'year' => $validated['year'] ?? null,
                'page_count' => $validated['page_count'] ?? null,
                'short_description' => $validated['short_description'] ?? null,
                'description' => $validated['description'] ?? null,
                'price' => $validated['price'] ?? null,
            ]);

            if ($request->has('book_cover') && count($request->book_cover) == 1) {
                foreach ($request->book_cover as $document) {
                    Helper::handleUploadedSingleFile($book, $document, 'book_cover');
                }
            }

            if (!$book) {
                throw new \Exception(__('Kitap oluşturulamadı.'));
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('Kitap başarıyla oluşturuldu.')
            ], 200);

        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Book creation error: ' . $exception->getMessage());

            throw ValidationException::withMessages(['error' => $exception->getMessage()]);
        }
    }

    /**
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function show(string $id)
    {
        try {

            $book = Book::findOrFail($id);

            return view('admin.books.show', compact('book'));

        } catch (\Exception $e) {
            Log::error('Book show error: ' . $e->getMessage());
            abort(500, 'Kitap görüntülenirken bir hata oluştu.');
        }
    }

    /**
     *
     * @param  Book  $book
     * @return \Illuminate\View\View
     */
    public function edit(Book $book)
    {
        try {
            $categories = Category::all();

            return view('admin.books.edit', [
                'book' => $book,
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            Log::error('Book edit error: ' . $e->getMessage());
            abort(500, 'Kitap düzenleme sayfası yüklenirken bir hata oluştu.');
        }
    }

    /**
     *
     * @param  UpdateRequest  $request
     * @param  Book  $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Book $book)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            $updated = $book->update([
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'user_id' => auth()->id(),
                'author' => $validated['author'] ?? $book->author,
                'publisher' => $validated['publisher'] ?? $book->publisher,
                'year' => $validated['year'] ?? $book->year,
                'page_count' => $validated['page_count'] ?? $book->page_count,
                'short_description' => $validated['short_description'] ?? $book->short_description,
                'description' => $validated['description'] ?? $book->description,
                'price' => $validated['price'] ?? $book->price,
            ]);

            if (!$updated) {
                throw new \Exception(__('Kitap güncellenemedi.'));
            }

            if ($request->has('book_cover') && count($request->book_cover) == 1) {
                foreach ($request->book_cover as $document) {
                    Helper::handleUploadedSingleFile($book, $document, 'book_cover');
                }
            }
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('Kitap başarıyla güncellendi.')
            ], 200);

        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Book update error: ' . $exception->getMessage());

            throw ValidationException::withMessages(['error' => $exception->getMessage()]);
        }
    }

    /**
     *
     * @param  Book  $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Book $book)
    {
        DB::beginTransaction();

        try {
            if ($book->hasMedia('book_cover')) {
                $book->clearMediaCollection('book_cover');
            }

            $deleted = $book->delete();

            if (!$deleted) {
                throw new \Exception(__('Kitap silinemedi.'));
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('Kitap başarıyla silindi.')
            ], 200);

        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Book deletion error: ' . $exception->getMessage());

            throw ValidationException::withMessages(['error' => __('Kitap silinemedi.')]);
        }
    }

    /**
     *
     * @param Request $request
     * @param Book $book
     * @param string $collection
     * @return void
     */
    private function validateAndUploadImage(Request $request, Book $book, string $collection)
    {
        try {
            $file = $request->file('book_cover');

            $maxFileSize = 5 * 1024 * 1024; // 5MB
            $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

            if ($file->getSize() > $maxFileSize) {
                throw new \Exception('Dosya boyutu çok büyük (max: 5MB).');
            }

            if (!in_array($file->getMimeType(), $allowedMimes)) {
                throw new \Exception('Geçersiz dosya formatı. Sadece JPG, PNG ve WEBP formatları kabul edilir.');
            }

            $safeFileName = preg_replace('/[^a-z0-9]+/', '-', strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)));
            $safeFileName = $safeFileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $book->clearMediaCollection($collection);
            $book->addMedia($file)
                ->usingFileName($safeFileName)
                ->toMediaCollection($collection);

        } catch (\Exception $e) {
            Log::error('File upload error: ' . $e->getMessage());
            throw new \Exception('Dosya yüklenirken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
