<div class="flex justify-center">
    <div class="w-6/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <div>
            @if(session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <section>
            @if($image)
                <img src="{{ $image }}" width="200" alt="Comment Image">
            @endif
            <input type="file" id="image" wire:change="$emit('fileChosen')">
        </section>
        <form class="my-4 flex" wire:submit.prevent="addComment">
            <input
                wire:model.debounce.500ms="newComment"
                type="text"
                class="w-full rounded border shadow p-2 mr-2 my-2"
                placeholder="What's in your mind?"
            />
            <div class="py-2">
                <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">
                    Add
                </button>
            </div>
        </form>
        @foreach($comments as $comment)
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="font-bold text-lg">{{ $comment->user->name }}</p>
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <i
                    wire:click="removeComment({{ $comment->id }})"
                    class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"
                ></i>
            </div>
            <p class="text-gray-800">{{ $comment->body }}</p>
        </div>
        @endforeach
        {{ $comments->links('pagination-links') }}
    </div>
</div>

<script>
    window.livewire.on('fileChosen', () => {
        let inputField = document.getElementById('image');
        let file       = inputField.files[0];
        let reader     = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result);
        };
        reader.readAsDataURL(file);
    });
</script>
