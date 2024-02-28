@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => __("Tasks")])
@endsection

@section('styles')
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Tasks")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="mb-2"></div>
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#addTask" class="btn btn-success add-btn" id="create-btn">
                                <i class="ri-add-line align-bottom me-1"></i> {{ __("Add") }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <form action="" method="get">
                                    <div class="form-floating">
                                        <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Search...") }}">
                                        <label for="search">{{ __("Type a Keyword...") }}</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __("Id") }}</th>
                                <th scope="col">{{ __("Name") }}</th>
                                <th scope="col">{{ __("Deadline") }}</th>
                                <th scope="col">{{ __("Completed") }}</th>
                                <th scope="col">{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <form id="form{{ $task->id }}" action="{{ route('account.tasks.destroy', $task->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td><a href="#" class="fw-semibold">{{ $task->id }}</a></td>
                                <td>{{ $task->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d M, Y') }}</td>
                                <td>{{ $task->progress_percentage }}%</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('account.tasks.edit', $task->id) }}" class="btn btn-sm btn-success edit-item-btn" data-bs-target="#showModal">{{ __("Edit") }}</a>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-sm btn-danger remove-item-btn" data-id="{{ $task->id }}">{{ __("Delete") }}</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">
                                                {{ __("Confirm Deletion") }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-3">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                <div class="mt-4 pt-2 fs-15 mx-5">
                                                    <h4>{{ __("Are you Sure ?") }}</h4>
                                                    <p class="text-muted mx-4 mb-0">{{ __("Are you Sure You want to Delete this Task?") }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form{{ $task->id }}').submit();">
                                                {{ __("Delete") }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Modal -->
                            @empty
                        </tbody>

                        <tr>
                            <th colspan="4" class="text-center">{{ __("No items found!") }}</th>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <x-pagination :model="$tasks" />
                    </div>
                    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sidebar-span" id="addTaskLabel">{{ __("Add Task") }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('account.tasks.store') }}">
                                        @csrf

                                        <div class="form-floating mb-2">
                                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                                            <label for="title">{{ __("Title") }}</label>
                                        </div>

                                        <div class="form-floating mb-2">
                                            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                                            <label for="description">{{ __("Description") }}</label>
                                        </div>

                                        <div class="form-group row mb-2">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" name="priority" id="priority" class="form-control" value="{{ old('priority') }}" required>
                                                    <label for="priority">{{ __("Priority") }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" name="progress_percentage" id="progress_percentage" class="form-control" value="{{ old('progress_percentage') }}" required>
                                                    <label for="progress_percentage">{{ __("Progress Percentage") }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-2">
                                            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline') }}" required>
                                            <label for="deadline">{{ __("Deadline") }}</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="project_id">{{ __("Project") }}</label>
                                                    <select name="project_id" id="project_id" class="form-control" required>
                                                        @foreach(request()->user('account')->projects as $project)
                                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="status_id">{{ __("Status") }}</label>
                                                    <select name="status_id" id="status_id" class="form-control" required>
                                                        @foreach(App\Models\Status::all() as $status)
                                                        <option value="{{$status->id}}">{{__($status->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">{{ __("Create Task") }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection

@section('scripts')

<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    // SweetAlert Delete Confirmation
    document.addEventListener('DOMContentLoaded', function() {
        const removeButtons = document.querySelectorAll('.remove-item-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const taskId = button.dataset.id;
                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15 mx-5">' +
                        '<h4>{{ __("Are you Sure ?") }}</h4>' +
                        '<p class="text-muted mx-4 mb-0">{{ __("Are you Sure You want to Delete this Task?") }}</p>' +
                        '</div></div>',
                    confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
                    confirmButtonText: "{{ __("Yes, Delete It!") }}",
                    cancelButtonClass: "btn btn-danger w-xs mb-1",
                    buttonsStyling: false,
                    showCloseButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form' + taskId).submit();
                    }
                });
            });
        });
    });
</script>
<!-- End Sweet Alert init js-->
@endsection