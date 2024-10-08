<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Livewire\Component;

class DependedCategory extends Component
{
    public $categories;
    public $subCategories = [];
    public $childCategories = null;
    public $selectedCategory = null;
    public $selectedSubCategory = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSelectedCategory($category)
    {
        $this->subCategories = [];
        $this->childCategories = null;
        $this->selectedSubCategory = null;

        if (!is_null($this->selectedCategory)) {
            $this->subCategories = SubCategory::where('category_id', $category)->get();
        }
    }
    public function updatedSelectedSubCategory($category)
    {
        if (!is_null($this->selectedSubCategory)) {
            $this->childCategories = ChildCategory::where('sub_category_id', $category)->get();
        }
    }
    public function render()
    {
        return view('livewire.depended-category');
    }
}