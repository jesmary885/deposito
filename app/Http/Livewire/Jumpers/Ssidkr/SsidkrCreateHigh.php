<?php

namespace App\Http\Livewire\Jumpers\Ssidkr;

use App\Models\Link;
use Livewire\Component;

class SsidkrCreateHigh extends Component
{
    public $isopen = false, $psid, $high, $pid;

    protected $rules_create = [
        'psid' => 'required',
        'high' => 'required',
        'pid' => 'required',
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
        return view('livewire.jumpers.ssidkr.ssidkr-create-high');
    }

    public function save(){
        $rules_create = $this->rules_create;
        $this->validate($rules_create);

        $user_auth =  auth()->user()->id;
        $long_psid = strlen($this->psid);

       if($long_psid>5)$part_psid = substr($this->psid, 0, 5);
        else $part_psid = $this->psid;

        $link = new Link();
        $link->high = $this->high;
        $link->psid = $part_psid;
        $link->pid = $this->pid;
        $link->user_id = $user_auth;
        $link->jumper_type_id = 2;
        $link->save();

        $this->reset(['high','isopen','pid','psid']);
        $this->emitTo('jumpers.ssidkr.ssidkr-index','render');
    }
}
