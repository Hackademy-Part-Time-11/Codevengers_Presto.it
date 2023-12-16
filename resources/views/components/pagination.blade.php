@if ($paginator->hasPages())
    <nav id="pagination" role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center align-items-center">
        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @else
                <li class="page-item">
                    <button type="button" wire:click="previousPage('page')" x-on:click="($el.closest('body') || document.querySelector('body')).scrollIntoView()" wire:loading.attr="disabled" dusk="previousPage.before" class="page-link">
                        &laquo; Previous
                    </button>
                </li>
            @endif


            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span classz="">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <button type="button" wire:click="gotoPage({{ $page }}, 'page')" x-on:click="($el.closest('body') || document.querySelector('body')).scrollIntoView()" class="page-link">
                                {{ $page }}
                            </button>
                        </li>
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button type="button" wire:click="nextPage('page')" x-on:click="($el.closest('body') || document.querySelector('body')).scrollIntoView()" wire:loading.attr="disabled" dusk="nextPage.before" class="page-link">
                        Next &raquo;
                    </button>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">Next &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
