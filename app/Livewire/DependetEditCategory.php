<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class DependetEditCategory extends Component
{
    public $categories;
    public $subCategories = [];
    public $childCategories = [];
    public $selectedCategory = null;
    public $selectedSubCategory = null;
    public $selectedChildCategory = null;

    public function mount($category, $subCategory, $childCategory)
    {
        Log::info('Mount method called', ['category' => $category, 'subCategory' => $subCategory, 'childCategory' => $childCategory]);
        $this->categories = Category::all();
        $this->selectedCategory = $category;
        $this->selectedSubCategory = $subCategory;
        $this->selectedChildCategory = $childCategory;
        $this->updateSubCategories();
        $this->updateChildCategories();
    }

    public function updatedSelectedCategory($category)
    {
        Log::info('updatedSelectedCategory called', ['category' => $category]);
        $this->selectedSubCategory = null;
        $this->selectedChildCategory = null;
        $this->subCategories = [];
        $this->childCategories = [];
        $this->updateSubCategories();
        Log::info('After updateSubCategories', ['subCategoriesCount' => count($this->subCategories)]);
    }

    public function updatedSelectedSubCategory($subCategory)
    {
        Log::info('updatedSelectedSubCategory called', ['subCategory' => $subCategory]);
        $this->selectedChildCategory = null;
        $this->childCategories = [];
        $this->updateChildCategories();
        Log::info('After updateChildCategories', ['childCategoriesCount' => count($this->childCategories)]);
    }

    private function updateSubCategories()
    {
        if (!is_null($this->selectedCategory)) {
            $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get();
            Log::info('updateSubCategories', ['selectedCategory' => $this->selectedCategory, 'subCategoriesCount' => count($this->subCategories)]);
        } else {
            Log::info('updateSubCategories: selectedCategory is null');
        }
    }

    private function updateChildCategories()
    {
        if (!is_null($this->selectedSubCategory)) {
            $this->childCategories = ChildCategory::where('sub_category_id', $this->selectedSubCategory)->get();
            Log::info('updateChildCategories', ['selectedSubCategory' => $this->selectedSubCategory, 'childCategoriesCount' => count($this->childCategories)]);
        } else {
            Log::info('updateChildCategories: selectedSubCategory is null');
        }
    }

    public function render()
    {
        Log::info('Render method called', [
            'selectedCategory' => $this->selectedCategory,
            'selectedSubCategory' => $this->selectedSubCategory,
            'selectedChildCategory' => $this->selectedChildCategory,
            'subCategoriesCount' => count($this->subCategories),
            'childCategoriesCount' => count($this->childCategories)
        ]);
        return view('livewire.dependet-edit-category');
    }
}