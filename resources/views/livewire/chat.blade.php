<div>

    <div class="container" id="chat">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="search-container">
                    <input wire:model.live="search" class="form-control mt-3" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-3">
                    @foreach ($conversations as $conversation)
                    <li class="d-flex align-items-center" wire:click="selectConversation({{ $conversation->id }})">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                        </div>
                        <div class="about ml-3">
                            <div class="name">{{ $conversation->users->where('id', '!=', auth()->id())->first()->name }}</div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- chat -->

            <div class="col-md-9">
                <div class="chat">
                    <div class="row chat-header">
                        <div class="col-lg-6 d-flex align-items-center" id="chat-about">
                            @if($chat)
                            <div class="avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </div>
                            <div class=" ml-3">

                                <h6>{{ $chat->users->where('id', '!=', auth()->id())->first()->name }}</h6>

                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="chat-history align-self-stretch">
                        @foreach ($messages as $key => $groupedMessages)
                        <div class="d-flex justify-content-center">
                            <h6>{{ $key }}</h6>
                        </div>
                        <ul class="messages m-b-0">
                            @foreach ($groupedMessages as $message)
                            <li class="{{ $message->user_id == Auth::user()->id ? 'my-message' : 'other-message' }}">
                                <div class="message-content">
                                    <div>
                                        <span>{{ $message->content }}</span>
                                    </div>

                                    <div class="message-time">{{ $message->created_at->format('H:i') }}</div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        @endforeach
                    </div>
                    <div class="row sendMessage">
                        <div class="col-12">
                            <form wire:submit="sendMessage">
                                <div class="input-group mt-3">
                                    <input wire:model.live="message" type="text" class="form-control" placeholder="Inserisci il tuo messaggio">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>