<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{

    public User $user;
    public $message = '';
    
    public function render()
    {
        // Membuat kunci dinamis
        $messagesKey = 'messagesID-' . Auth::id();
    
        $$messagesKey = Message::where('to_user_id', $this->user->id)
        ->where('from_user_id', Auth::id())
        ->orWhere('from_user_id', $this->user->id)
        ->Where('to_user_id' , Auth::id())
        ->with(['fromUser','toUser'])
        ->get();


        // dd($$messagesKey);
        $dataToSend = [
            'messagesID-' . Auth::id() => $$messagesKey
        ];
        
        // dd($dataToSend);
    
        return view('livewire.chat', [
            'data' => $dataToSend,
            'users' => User::where('id', '!=',Auth::id())->get()
        ]);
    }
    
    

    public function sendMessage(){
        Message::create(
            [
                'from_user_id' => Auth::id(),
                'to_user_id' => $this->user->id,
                'message' => $this->message
            ]
            );

            $this->reset('message');
    }
}
