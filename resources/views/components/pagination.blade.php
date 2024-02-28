<nav aria-label="...">
    <ul class="pagination">
        @if($model->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $model->previousPageUrl() }}" tabindex="-1">{{ __('Previous') }}</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">{{ __('Previous') }}</span>
            </li>
        @endif

        @for ($i = 1; $i <= $model->lastPage(); $i++)
            <li class="page-item {{ ($model->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $model->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if($model->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $model->nextPageUrl() }}">{{ __('Next') }}</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">{{ __('Next') }}</span>
            </li>
        @endif
    </ul>
</nav>
