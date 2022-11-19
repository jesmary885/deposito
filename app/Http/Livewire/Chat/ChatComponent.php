<?php

namespace App\Http\Livewire\Chat;

use App\Models\Chat;
use App\Models\Contact;
use Livewire\Component;

class ChatComponent extends Component
{
    public $search;
    public $contactChat,$chat, $bodyMessage;

    //propiedad computada

    protected $listeners = ['render' => 'render','open_chat_contact' => 'open_chat_contact'];

    public function getContactsProperty(){
        return Contact::where('user_id',auth()->id())
            ->when($this->search, function($query){
                $query->where(function($query){
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhereHas('user',function($query){
                            $query->where('email','like', '%'.$this->search.'%');
                        });
                    });
                })
            ->get() ?? [];
    }

    public function getChatsProperty(){
        return auth()->user()->chats()->get();
    }

    public function getMessagesProperty(){
        return $this->chat ? $this->chat->messages()->get() : [];
        //es igual a Message::where('chat_id', $this->chat->id)->get()
    }

    public function open_chat_contact(Contact $contact){
        //dd($contact);
        $chat= auth()->user()->chats()
            ->whereHas('users',function($query) use ($contact){
                $query->where('user_id', $contact->contact_id);
            })
            ->has('users',2)
            ->first();

        if($chat){
            $this->chat = $chat;
            $this->reset('bodyMessage','contactChat','search');
        }
        else{
            $this->contactChat = $contact;
            $this->reset('chat','bodyMessage','search');
            
        }
    }

    public function open_chat(Chat $chat){
        $this->chat = $chat;
        $this->reset('bodyMessage','contactChat');
    }

    public function sendMessage(){
        $this->validate([
            'bodyMessage' => 'required'
        ]);

        if(!$this->chat){
            $this->chat = Chat::create();
            $this->chat->users()->attach([auth()->user()->id,$this->contactChat->contact_id]);
        }

        $this->chat->messages()->create([
            'body' => $this->bodyMessage,
            'user_id' => auth()->user()->id

        ]);

        $this->reset('bodyMessage','contactChat');        
    }

    public function render()
    {
        return view('livewire.chat.chat-component');
    }

    
}
