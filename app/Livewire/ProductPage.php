<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - ShopHex')]

class ProductPage extends Component
{
    use WithPagination;

    public function render()
    {
        $productQuery = Product::query()->where('is_active' , 1);
        return view('livewire.product-page' , [
            'products' => $productQuery->paginate(6),
            'brands' => Brand::get(['id', 'name' , 'slug']),
            'categories' => Category::get(['id' , 'name' , 'slug']),
        ]);
    }
}
