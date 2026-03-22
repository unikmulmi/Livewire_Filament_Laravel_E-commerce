<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Page - ShopHex')]

class ProductPage extends Component
{
    public function render()
    {
        return view('livewire.product-page');
    }
}
