<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\CategoryMarketplace;
use App\Models\Marketplace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MarketplaceCreate extends Component
{
    public $isopen = false;
    public $name,$price,$description,$categories,$category_id="",$estado,$cant;

    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'cant' => 'required',
    ];

    public function mount(){
        $this->categories =  CategoryMarketplace::all();
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function render()
    {
        return view('livewire.marketplace.marketplace-create');
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $user=Auth::id();

        $marketplace = new Marketplace();
        $marketplace->name = $this->name;
        $marketplace->price = $this->price;
        $marketplace->description = $this->description;
        $marketplace->status = $this->estado;
        $marketplace->user_id = $user;
        $marketplace->cant = $this->cant;
        $marketplace->category_marketplace_id = $this->category_id;
        $marketplace->save();

        $this->reset(['isopen','name','price','description','estado','cant','category_id']);
        $this->emitTo('marketplace.marketplace-index','render');
    }


}
