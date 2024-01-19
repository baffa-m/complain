<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @dd($complaint)
    <div class="w-2/4 mx-auto pt-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3>{{ $complaint->title }}</h3>
            <h4>{{ $complaint->course }} </h4>
            <p>{{ $complaint->description }}</p>
        </div>

        <div class="chat-messages mt-6 overflow-y-auto max-w-md mx-auto" style="max-height: 300px;">
            @foreach($messages as $message)

            <div class="flex items-start gap-2.5 my-4">
                <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700
                    @if($message->user_id === auth()->id()) ml-auto @endif">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">
                            @if($message->sender_type === 'STUDENT')
                                {{ $message->user->name }}
                            @else
                                {{ $message->user->name ?? 'Unknown User' }}
                            @endif
                        </span>
                    </div>
                    <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ $message->content }}.</p>
                </div>
            </div>

            @endforeach
        </div>

        <!-- New message input -->
        <div class="new-message mt-6">
            <form wire:submit="{{ route('complaints.chat.store', $complaint) }}" method="post">
                @csrf
                <input name="content" type="text"
                    class="w-full rounded-lg p-2 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                    cols="30" rows="3" placeholder="Type your message" />
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button wire:
                    class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
                    Send
                </button>
            </form>
        </div>
    </div>

</div>
