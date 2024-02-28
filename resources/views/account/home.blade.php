@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => __("Dashboard")])
@endsection

@section('styles')
<!-- Additional styles for this page -->
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Home")])
@endsection

@section('content')
<div class="row">
    <div class="col-xxl-5">
        <div class="d-flex flex-column h-100">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("New Projects") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $totalNewProjectsCurrentMonth }}">{{ $totalNewProjectsCurrentMonth }}</span>
                                    </h2>
                                    <p class="mb-0 text-muted">
                                        <span class="badge {{ $newProjectsVsPreviousMonthPercentage > 0 ? 'bg-light text-success' : ($newProjectsVsPreviousMonthPercentage < 0 ? 'bg-light text-danger' : 'bg-light text-muted') }} mb-0">
                                            <i class="ri-arrow-{{ $newProjectsVsPreviousMonthPercentage > 0 ? 'up-line' : ($newProjectsVsPreviousMonthPercentage < 0 ? 'down-line' : 'up-down-fill') }} align-middle"></i> {{ abs($newProjectsVsPreviousMonthPercentage) }} %
                                        </span> {{ __("vs. previous month") }}
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i data-feather="users" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("Total Budget") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $totalBudgetCurrentMonth }}">{{ $totalBudgetCurrentMonth }}</span>
                                    </h2>
                                    <p class="mb-0 text-muted">
                                        <span class="badge {{ $totalBudgetVsPreviousMonthPercentage > 0 ? 'bg-light text-danger' : ($totalBudgetVsPreviousMonthPercentage < 0 ? 'bg-light text-success' : 'bg-light text-muted') }} mb-0">
                                            <i class="ri-arrow-{{ $totalBudgetVsPreviousMonthPercentage > 0 ? 'up-line' : ($totalBudgetVsPreviousMonthPercentage < 0 ? 'down-line' : 'up-down-fill') }} align-middle"></i> {{ abs($totalBudgetVsPreviousMonthPercentage) }} %
                                        </span> {{ __("vs. previous month") }}
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i data-feather="activity" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("Completed Projects") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $totalCompletedProjectsCurrentMonth }}">0</span>
                                    </h2>
                                    <p class="mb-0 text-muted">
                                        <span class="badge {{ $completedProjectsVsPreviousMonthPercentage > 0 ? 'bg-light text-success' : ($completedProjectsVsPreviousMonthPercentage < 0 ? 'bg-light text-danger' : 'bg-light text-muted') }} mb-0">
                                            <i class="ri-arrow-{{ $completedProjectsVsPreviousMonthPercentage > 0 ? 'up-line' : ($completedProjectsVsPreviousMonthPercentage < 0 ? 'down-line' : 'up-down-fill') }} align-middle"></i> {{ abs($completedProjectsVsPreviousMonthPercentage) }} %
                                        </span> {{ __("vs. previous month") }}
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i data-feather="clock" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ __("Field Projects") }}</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">
                                        <span class="counter-value" data-target="{{ $totalFieldProjectsCurrentMonth }}">0</span>
                                    </h2>
                                    <p class="mb-0 text-muted">
                                        <span class="badge {{ $fieldProjectsVsPreviousMonthPercentage > 0 ? 'bg-light text-danger' : ($fieldProjectsVsPreviousMonthPercentage < 0 ? 'bg-light text-success' : 'bg-light text-muted') }} mb-0">
                                            <i class="ri-arrow-{{ $fieldProjectsVsPreviousMonthPercentage > 0 ? 'up-line' : ($fieldProjectsVsPreviousMonthPercentage < 0 ? 'down-line' : 'up-down-fill') }} align-middle"></i> {{ abs($fieldProjectsVsPreviousMonthPercentage) }} %
                                        </span> {{ __("vs. previous month") }}
                                    </p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                            <i data-feather="external-link" class="text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->
        </div>
    </div> <!-- end col-->
</div> <!-- end row-->
@endsection

@section('scripts')

@endsection