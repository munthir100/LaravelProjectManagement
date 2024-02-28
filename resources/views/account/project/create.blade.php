@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => "Create Project"])
@endsection

@section('styles')
<!-- Add your stylesheets if needed -->
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => "Account", "title" => "Projects > Create"])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <span class="mb-0">{{ __('Create Project') }}</span>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('account.projects.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="number_of_team_members" class="form-label">{{ __('Number of Team Members') }}</label>
                            <input type="number" name="number_of_team_members" id="number_of_team_members" class="form-control @error('number_of_team_members') is-invalid @enderror" value="{{ old('number_of_team_members') }}" required>
                            @error('number_of_team_members')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="deadline" class="form-label">{{ __('Deadline') }}</label>
                            <input type="datetime-local" name="deadline" id="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}" required>
                            @error('deadline')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="short_description" class="form-label">{{ __('Short Description') }}</label>
                            <textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="priority" class="form-label">{{ __('Priority') }}</label>
                            <input type="number" name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ old('priority') }}" required>
                            @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="form-label">{{ __('Type') }}</label>
                            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" required>
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="budget" class="form-label">{{ __('Budget') }}</label>
                            <input type="number" name="budget" id="budget" class="form-control @error('budget') is-invalid @enderror" step="0.01" value="{{ old('budget') }}" required>
                            @error('budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">{{ __('Parent Project') }}</label>
                        <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                            <!-- Populate options based on your existing projects -->
                        </select>
                        @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Create Project') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Add your scripts if needed -->
@endsection