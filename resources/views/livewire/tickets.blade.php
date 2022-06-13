<div>
    <h1 class="text-3xl">Support Tickets</h1>

    @foreach($tickets as $ticket)
        <div
            wire:click="$emit('ticketSelected', {{ $ticket->id }})"
            class="rounded border shadow p-3 my-2 cursor-pointer {{ $active == $ticket->id ? 'bg-green-200' : '' }}"
        >
            <p class="text-gray-800">{{ $ticket->question }}</p>
        </div>
    @endforeach
</div>
