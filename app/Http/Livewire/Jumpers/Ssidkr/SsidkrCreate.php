<?php

namespace App\Http\Livewire\Jumpers\Ssidkr;

use App\Models\Link;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class SsidkrCreate extends Component
{
    public $isopen = false,$psid,$basic;

    protected $rules_create = [
        'psid' => 'required',
        'basic' => 'required',
    ];

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
        
        return view('livewire.jumpers.ssidkr.ssidkr-create');
    }

    public function save(){
        $rules_create = $this->rules_create;
        $this->validate($rules_create);

        $user_auth =  auth()->user()->id;
        $long_psid = strlen($this->psid);

       if($long_psid>5)$part_psid = substr($this->psid, 0, 5);
        else $part_psid = $this->psid;

       $jumper = 'http://dkr1.ssisurveys.com/projects/end?rst=1&psid='.$part_psid;

        $link = new Link();
        $link->basic = $this->basic;
        $link->psid = $part_psid;
        $link->jumper = $jumper;
        $link->user_id = $user_auth;
        $link->jumper_type_id = 1;
        $link->save();

        $this->reset(['basic','isopen','psid']);
        $this->emitTo('jumpers.ssidkr.ssidkr-index','render');
    }
}
