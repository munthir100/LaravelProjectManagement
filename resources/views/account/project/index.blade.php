@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => __("Projects")])
@endsection

@section('styles')
<link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('content')
<div class="row">
    <div class="col-xxl-7">
        <div class="row">
            @forelse($projects as $project)

            <div class="col-xl-4 col-md-6">
                <!-- card -->
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('account.tasks.project', $project->id) }}">{{ __("Tasks") }}</a>
                                <a class="dropdown-item" href="{{ route('account.projects.edit', $project->id) }}">{{ __("Edit") }}</a>
                                <a class="dropdown-item remove-item-btn" data-id="{{ $project->id }}">{{ __("Delete") }}</a>
                            </div>
                        </div>
                        <div class="custom-cart-projects-title">
                            <h5 class="fs-15 fw-semibold">{{ $project->title }}</h5>
                        </div>
                        <div class="custom-cart-projects-text">
                            <p class="text-muted">{{ $project->short_description }}</p>
                        </div>
                        <div class="d-flex flex-wrap justify-content-evenly">
                            <x-status-card :statusId="$project->status_id" />
                            <p class="text-muted mb-0"><i class="mdi mdi-numeric-{{ $project->number_of_team_members }}-circle text-primary fs-18 align-middle me-2"></i>{{ __("Team Member") }}</p>
                        </div>
                        <p class="text-muted ml-4">{{ \Carbon\Carbon::parse($project->deadline)->diffForHumans() }}</p>
                    </div>

                    <div class="progress mt-2" style="height: 10px;">
                        <x-card-precentage :project="$project" />
                    </div>
                </div>
                <form id="form{{$project->id}}" action="{{route('account.projects.destroy',$project->id)}}" method="post" class="hidden">
                    @csrf
                    @method('delete')
                </form>
                <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">{{ __("Confirm Deletion") }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-3">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                    <div class="mt-4 pt-2 fs-15 mx-5">
                                        <h4>{{ __("Are you Sure ?") }}</h4>
                                        <p class="text-muted mx-4 mb-0">{{ __("You Will Delete Also Tasks Related With This Project?") }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                                <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form{{$project->id}}').submit();">{{ __("Delete") }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            @empty
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-danger">
                                <p class="text-alert">
                                    {{ __("no items found") }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a data-bs-toggle="modal" data-bs-target="#createProject" class="btn btn-primary">{{ __("Add New") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div> <!-- end row-->
    </div>
</div>

<!-- Add New Button -->

@endsection

@section('scripts')
<script>
    // SweetAlert Delete Confirmation
    document.addEventListener('DOMContentLoaded', function() {
        const removeButtons = document.querySelectorAll('.remove-item-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const projectId = button.dataset.id;
                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15 mx-5">' +
                        '<h4>{{ __("Are you Sure ?") }}</h4>' +
                        '<p class="text-muted mx-4 mb-0">{{ __("You Will Delete Also Tasks Related With This Project?") }}</p>' +
                        '</div></div>',
                    confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
                    confirmButtonText: "{{ __("Yes, Delete It!") }}",
                    cancelButtonClass: "btn btn-danger w-xs mb-1",
                    buttonsStyling: false,
                    showCloseButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form' + projectId).submit();
                    }
                });
            });
        });
    });
</script>
<!-- Additional scripts for this page -->
@endsection