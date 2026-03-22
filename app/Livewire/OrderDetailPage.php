<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Order Details Page - ShopHeX')]

class OrderDetailPage extends Component
{
    public function render()
    {
        return view('livewire.order-detail-page');
    }
}
