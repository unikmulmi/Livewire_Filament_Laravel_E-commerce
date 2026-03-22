<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Categories - ShopHeX')]

class CategoryPage extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-page' , [
            'categories' => $categories,
        ]);
    }
}
