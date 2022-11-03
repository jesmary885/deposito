<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Marketplace;
use Livewire\Component;

class MarketplaceShopping extends Component
{
    public $marketplace,$marketplace_select;

    public function mount(){
        $this->marketplace_select = Marketplace::where('id',$this->marketplace)->first(); 
    }
    public function render()
    {
        return view('livewire.marketplace.marketplace-shopping');
    }
}
