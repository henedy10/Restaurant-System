<div>
    <div class="chat-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-3 d-flex justify-content-between align-items-center border-bottom border-dark bg-dark">
            <h5 class="mb-0 text-warning fw-bold">Contacts</h5>
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold">
                Exit
            </a>
        </div>

        <div class="chat-list">
            @forelse ( $contacts as $contactName )
                <div class="chat-item" wire:click="Query('{{$contactName}}')">{{$contactName}}</div>
            @empty
                <div class="text-gray-500 italic">No contacts found.</div>
            @endforelse
        </div>
    </div>
    <!-- Chat Box -->
    <div class="chat-box d-flex flex-column">
        @if($Name)
            <div class="chat-header">
                <h6 class="mb-0"> {{$Name}}</h6>
            </div>

            <div class="chat-messages d-flex flex-column">
                @forelse ($clientMessages as $message)
                    <div class="message received">
                        {{$message->message}}
                    </div>
                @empty
                @endforelse
                {{-- @forelse ($messages as $message)
                    <div class="message sent">
                        {{$message->message}}
                    </div>
                    @empty
                @endforelse --}}
            </div>

            <div class="chat-input d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Write a message.....">
                <button class="btn">Send</button>
            </div>
        @endif
    </div>
</div>
</div>
