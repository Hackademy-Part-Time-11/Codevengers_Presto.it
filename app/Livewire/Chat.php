<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\Item;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $chat = null;
    public $message;
    public $messages = [];
    public $item;
    public $search = '';
    public $conversations;

    public function mount(Item $item)
    {
        if ($item->id) {
            $this->item = $item;
            $this->createConversation();
        } 
    }

    public function selectConversation($conversationId)
    {

        $this->chat = Conversation::findOrFail($conversationId);
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $messages = Message::where('conversation_id', $this->chat->id)
            ->orderBy('created_at', 'asc')
            ->get();

        $groupedMessages = [];

        foreach ($messages as $message) {
            $date = $message->created_at->toDateString();

            if (!isset($groupedMessages[$date])) {
                $groupedMessages[$date] = [];
            }

            $groupedMessages[$date][] = $message;
        }

        $this->messages = $groupedMessages;
    }

    public function createConversation()
    {
        $otherUser = $this->item->user;

        $loggedInUser = Auth::user();

        $existingConversation = Conversation::whereHas('users', function ($query) use ($otherUser) {
            $query->where('user_id', $otherUser->id);
        })->whereHas('users', function ($query) use ($loggedInUser) {
            $query->where('user_id', $loggedInUser->id);
        })->first();

        if ($existingConversation === null) {
            $conversation = Conversation::create();
            $conversation->users()->attach([$otherUser->id, Auth::id()]);
            $this->chat = $conversation;
        } else {
            $this->chat = $existingConversation;
            $this->loadMessages();
        }
    }



    public function sendMessage()
    {

        $newMessage = Message::create([
            'user_id' => Auth::id(),
            'conversation_id' => $this->chat->id,
            'content' => $this->message,
        ]);

        $this->message = '';
        $this->loadMessages(); // Aggiorna i messaggi dopo l'invio di un nuovo messaggio
    }

    public function render()
    {

        $user = Auth::user();

        $conversations = Conversation::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });

        if (!empty($this->search)) {
            $conversations->whereHas('users', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $this->conversations = $conversations->get();
        return view('livewire.chat');
    }
}
