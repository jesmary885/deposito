<?php

namespace App\Http\Livewire\Jumpers\Ssidkr;

use App\Models\Comments;
use App\Models\Link;
use App\Models\User_Links_Points;
use Livewire\Component;
use Livewire\WithPagination;

class SsidkrIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $calculo_high,$pid_new,$search,$jumper_2,$points_user,$user_auth,$comentario,$is_high,$is_basic,$calc_link ;

    protected $listeners = ['render' => 'render'];

    public function mount(){
        $this->jumper_2 = '';
        $this->user_auth =  auth()->user()->id;
        $this->points_user='no';
        $this->is_basic = 'no';
        $this->is_high = 'no';
        $this->calc_link = 0;
    }

    public function render()
    {
        $long_psid = strlen($this->search);
        $subs_psid = 0;
        $jumper_complete = 0;
        $comments ="";
        $jumper = "";
        $link_complete="";


        if($long_psid>=5){
            if($long_psid==5){
                $jumper = Link::where('psid',$this->search)->first();

                if($jumper->jumper_type_id == 1){
                    $link_complete ="";
                    $this->is_basic = "si";
                    $this->calc_link = 1;
                } 
                if($jumper->jumper_type_id == 2){
                    $this->is_high = "si";
                } 
           }
           if($long_psid>=5 && $long_psid<48){
                $subs_psid = substr($this->search,0,5);
                $jumper = Link::where('psid',$subs_psid)->first();
                if($jumper->jumper_type_id == 1){
                    $this->is_basic = "si";
                    $link_complete = substr($this->search,5);
                    $this->calc_link = 1;
                } 
                if($jumper->jumper_type_id == 2){
                    $this->is_high = "si";
                } 
           }
           if($long_psid>48){ 
                $subs_psid = substr($this->search,49,5);
                $jumper = Link::where('psid',$subs_psid)->first();
                if($jumper->jumper_type_id == 1){
                    $this->is_basic = "si";
                    $link_complete = substr($this->search,55);
                    $this->calc_link = 1;
                } 
                if($jumper->jumper_type_id == 2){
                    $this->is_high = "si";
                } 
           }

           $this->jumper_2 = '1';
           $user_point= User_Links_Points::where('link_id',$jumper->id)
                ->where('user_id',$this->user_auth)
                ->first();
                
            $comments = Comments::where('link_id',$jumper->id)
                ->latest('id')
                ->paginate(5);
                
            if($user_point) $this->points_user='si';
            else $this->points_user='no';

            if($jumper->jumper_type_id == 1){
                $calc_link = 1;
                $jumper_complete = 'https://dkr1.ssisurveys.com/projects/end?rst=1&psid='.$jumper->psid.$link_complete.'**&basic='.$jumper->basic;
            } 
            if($jumper->jumper_type_id == 2){
                if($this->calc_link == 1){
                    $jumper_complete = 'https://dkr1.ssisurveys.com/projects/end?rst=1&psid='.$jumper->psid.$link_complete.'**&high='.$this->calculo_high;
                }
                
            } 
        }

        else{
            $this->jumper_2 = '';
        }
        return view('livewire.jumpers.ssidkr.ssidkr-index',compact('jumper_complete','jumper','comments','subs_psid'));
    }

    public function positivo($jumper_id){
        $jumper_id = Link::where('id',$jumper_id)->first();
        $new_points = $jumper_id->positive_points + 1;

        $jumper_id->update([
            'positive_points' => $new_points, 
        ]);

        $links_points = new User_Links_Points();
        $links_points->user_id = auth()->user()->id;
        $links_points->link_id = $jumper_id->id;
        $links_points->point = 'positive';
        $links_points->save();

        $this->emit('render', 'jumpers.ssidkr.ssidkr-index');

    }

    public function negativo($jumper_id){
        $jumper_id = Link::where('id',$jumper_id)->first();
        $new_points = $jumper_id->negative_points + 1;

        $jumper_id->update([
            'negative_points' => $new_points, 
        ]);

        $links_points = new User_Links_Points();
        $links_points->user_id = auth()->user()->id;
        $links_points->link_id = $jumper_id->id;
        $links_points->point = 'negative';
        $links_points->save();

        $this->emit('render', 'jumpers.ssidkr.ssidkr-index');
    }

    public function comentar($jumper_id){
        $jumper_id = Link::where('id',$jumper_id)->first();

        $comment = new Comments();
        $comment->comment = $this->comentario;
        $comment->link_id = $jumper_id->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        $this->emit('render', 'jumpers.ssidkr.ssidkr-index');
    }

    public function calculo_high($jumper_id){
        $this->calculo_high = 123;
        $this->calc_link = 1;

        $this->emit('render', 'jumpers.ssidkr.ssidkr-index');
    }
}
