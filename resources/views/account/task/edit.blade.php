@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => __("Tasks | Edit")])
@endsection

@section('styles')
<!-- Add your custom styles here -->
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Tasks > Edit")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="mb-2"></div>
                <div class="row g-4 mb-3">
                    <div class="col-sm">
                        <h4>{{ __("Edit Task") }}</h4>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <form action="{{ route('account.tasks.update', $task->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __("Title") }}</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __("Description") }}</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="priority" class="form-label">{{ __("Priority") }}</label>
                                <input type="number" class="form-control" id="priority" name="priority" value="{{ old('priority', $task->priority) }}">
                                @error('priority')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="progress_percentage" class="form-label">{{ __("Progress Percentage") }}</label>
                                <input type="number" class="form-control" id="progress_percentage" name="progress_percentage" value="{{ old('progress_percentage', $task->progress_percentage) }}">
                                @error('progress_percentage')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="deadline" class="form-label">{{ __("Deadline") }}</label>
                                <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline', date('Y-m-d', strtotime($task->deadline))) }}">
                                @error('deadline')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select class="form-select" id="status_id" name="status_id">
                                    @foreach (\App\Models\Status::all() as $status)
                                    <option value="{{ $status->id }}" {{ old('status_id', $task->status_id) == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Add other form fields as needed -->

                    <button type="submit" class="btn btn-primary">{{ __("Update Task") }}</button>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection

@section('scripts')
<!-- Add your custom scripts here -->
@endsection