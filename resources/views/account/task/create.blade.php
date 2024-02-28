@extends('layouts.shared.app-layout')

@section('title', __('Create Task'))

@section('content')
<div class="container">
    <h1>{{ __('Create Task') }}</h1>

    <form method="post" action="{{ route('account.tasks.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="priority">{{ __('Priority') }}</label>
            <input type="number" name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ old('priority') }}" required>
            @error('priority')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="progress_percentage">{{ __('Progress Percentage') }}</label>
            <input type="number" name="progress_percentage" id="progress_percentage" class="form-control @error('progress_percentage') is-invalid @enderror" value="{{ old('progress_percentage') }}" required>
            @error('progress_percentage')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deadline">{{ __('Deadline') }}</label>
            <input type="datetime-local" name="deadline" id="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}" required>
            @error('deadline')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status_id">{{ __('Status') }}</label>
            <!-- Assuming you have a form field for selecting the status -->
            <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror" required>
                <!-- Populate options based on your status options -->
                @foreach(\App\Models\Status::all() as $status)
                <option value="{{$status->id}}">{{__($status->name)}}</option>
                @endforeach
            </select>
            @error('status_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_id">{{ __('Project') }}</label>
            <!-- Assuming you have a form field for selecting the project -->
            <select name="project_id" id="project_id" class="form-control @error('project_id') is-invalid @enderror" required>
                @forelse($projects as $project)
                <option value="{{$project->id}}">{{$project->title}}</option>
                @empty
                <option></option>
                @endforelse
            </select>
            @error('project_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Create Task') }}</button>
    </form>
</div>
@endsection