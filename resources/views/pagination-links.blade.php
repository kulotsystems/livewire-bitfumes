@if($paginator->hasPages())
<ul class="flex justify-between">
    <!-- prev -->
    @if($paginator->onFirstPage())
        <li class="w-16 px-2 py-1 text-center rounded border bg-gray-100">
            Prev
        </li>
    @else
        <li
            class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer"
            wire:click="previousPage"
        >
            Prev
        </li>
    @endif
    <!-- prev end -->


    <!-- numbers -->
    <ul class="flex">
        @foreach ($elements as $element)
            @if(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li
                            wire:click="gotoPage({{ $page }})"
                            class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer"
                        >
                            {{ $page }}
                        </li>
                    @else
                        <li
                            wire:click="gotoPage({{ $page }})"
                            class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer"
                        >
                            {{ $page }}
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
    <!-- numbers end -->


    <!-- next -->
    @if($paginator->hasMorePages())
        <li
            class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer"
            wire:click="nextPage"
        >
            Next
        </li>
    @else
        <li class="w-16 px-2 py-1 text-center rounded border bg-gray">
            Next
        </li>
    @endif
    <!-- next end -->
</ul>
@endif
