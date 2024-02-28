@switch($statusId)
    @case(\App\Models\Status::NEW)
        <p class="text-muted mb-0">
            <i class="bx bxs-circle text-primary fs-18 align-middle me-2"></i>{{ __('New') }}
        </p>
        @break

    @case(\App\Models\Status::COMPLETED)
        <p class="text-muted mt-1 mb-0">
            <i class="bx bxs-circle text-success fs-18 align-middle me-2"></i>{{ __('Completed') }}
        </p>
        @break

    @case(\App\Models\Status::FAILD)
        <p class="text-muted mt-1 mb-0">
            <i class="bx bxs-circle text-danger fs-18 align-middle me-2"></i>{{ __('Failed') }}
        </p>
        @break

    @case(\App\Models\Status::CANCELED)
        <p class="text-muted mt-1 mb-0">
            <i class="bx bxs-circle text-danger fs-18 align-middle me-2"></i>{{ __('Cancelled') }}
        </p>
        @break

    @case(\App\Models\Status::IN_PROGRESS)
        <p class="text-muted mt-1 mb-0">
            <i class="bx bxs-circle text-warning fs-18 align-middle me-2"></i>{{ __('In Progress') }}
        </p>
        @break

    @default
        <!-- Handle default case if needed -->
@endswitch
