<div>


    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div wire:poll style="overflow-y: scroll; height: 500px !important;">
                        @forelse ($data['messagesID-'.auth()->id()] as $message)
                                <div class="chat @if ($message->from_user_id == auth()->id())
                                    chat-end @else chat-start @endif">
                                    <div class="chat-image avatar">
                                        <div class="w-10 rounded-full">
                                        <img
                                            alt="Tailwind CSS chat bubble component"
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                        </div>
                                    </div>

                                    <div class="chat-header">
                                        {{ $message->fromUser->name }}
                                        <time class="text-xs opacity-50">{{ $message->created_at->diffForHumans() }}</time>
                                    </div>

                                    <div class="chat-bubble">{{ $message->message }}</div>
                                    <div class="chat-footer opacity-50">Delivered</div>
                                    
                            </div>
                        @empty
                            
                        @endforelse

                    </div>
                    

                    <div class="form-control">
                        <form action="" wire:submit.prevent="sendMessage">
                        <div class="flex justify-between">
                                <div>
                                    <div class="drawer">
                                        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                                        <div class="drawer-content">
                                          <!-- Page content here -->
                                          <label for="my-drawer" class="btn btn-primary drawer-button">Open Chat</label>
                                        </div>
                                        <div class="drawer-side" style="z-index: 2 !important;">
                                          <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                                          <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                                            <h2>ID user {{ auth()->user()->name }}</h2>
                                            <h1 class="text2xl font-bold">
                                                User list
                                            </h1>
                        

                                            <ul class="menu bg-base-200 rounded-box w-56">
                                                    <li>
                                                    <h2 class="menu-title">Title</h2>
                                                    <ul>
                                                        <ul>
                                                            @foreach ($users as $user)
                                                            
                                                                <li >
                                                                    <a wire:navigate href="{{ route('chat', $user) }}"> {{ $user->name }}</a>
                                                                </li>
                                                            @endforeach
                                                    </ul>
                                                    </li>
                                              </ul>



                                            </ul>
                                          </ul>
                                        </div>
                                      </div>
                                </div>
                                <div>
                                    <textarea class="textarea textarea-bordered w-80" placeholder="Ketik pesan" wire:model="message"></textarea>
                                </div>
                                <div>
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
