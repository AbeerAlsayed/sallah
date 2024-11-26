<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use ApiResponse;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * جلب قائمة التصنيفات مع الباجينيشن.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $categories = Category::with('products')->paginate($perPage);

        return CategoryResource::collection($categories);
    }

    /**
     * جلب تصنيف واحد باستخدام ID مع الأطفال والمنتجات.
     */
    public function show(Category $category)
    {
        $category->load(['children', 'products']);

        return $this->successResponse(
            new CategoryResource($category),
            'Category fetched successfully.'
        );
    }

    /**
     * إنشاء تصنيف جديد.
     */
    public function store(CategoryRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $data = $request->validated();
            $category = $this->categoryService->create($data);

            return $this->successResponse(
                new CategoryResource($category),
                'Category created successfully.',
                201
            );
        });
    }

    /**
     * تحديث تصنيف موجود.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        return DB::transaction(function () use ($request, $category) {
            $data = $request->validated();
            $updatedCategory = $this->categoryService->update($category, $data);

            return $this->successResponse(
                new CategoryResource($updatedCategory),
                'Category updated successfully.'
            );
        });
    }

    /**
     * حذف تصنيف.
     */
    public function destroy(Category $category)
    {
        return DB::transaction(function () use ($category) {
            if (!$category) {
                throw new CustomException('Category not found.', 404);
            }

            $this->categoryService->delete($category);

            return $this->successResponse(
                null,
                'Category deleted successfully.'
            );
        });
    }

    /**
     * فلترة التصنيفات.
     */
    public function filter(Request $request)
    {
        $search = $request->input('search');
        $parentId = $request->input('parent_id');

        $query = Category::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%');
        }

        if ($parentId) {
            $query->where('parent_id', $parentId);
        }

        $categories = $query->with('products')->get();

        return $this->successResponse(
            CategoryResource::collection($categories),
            'Filtered categories fetched successfully.'
        );
    }
}
