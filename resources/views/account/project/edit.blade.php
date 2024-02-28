@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => "Edit Project"])
@endsection
@section('styles')
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => "Account", "title" => "Projects > Edit"])
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <span>{{ __('Edit Project') }}</span>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('account.projects.update', ['project' => $project->id]) }}">
                @csrf
                @method('PUT')



                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="short_description" class="form-label">{{ __('Short Description') }}</label>
                            <input name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description', $project->short_description) }}" required>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="number_of_team_members" class="form-label">{{ __('Number of Team Members') }}</label>
                        <input type="number" name="number_of_team_members" id="number_of_team_members" class="form-control @error('number_of_team_members') is-invalid @enderror" value="{{ old('number_of_team_members', $project->number_of_team_members) }}" required>
                        @error('number_of_team_members')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="deadline" class="form-label">{{ __('Deadline') }}</label>
                        <input type="datetime-local" name="deadline" id="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline', \Carbon\Carbon::parse($project->deadline)->format('Y-m-d\TH:i')) }}" required>
                        @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="goals" class="form-label">{{ __('Goals') }}</label>
                            <textarea name="goals" id="goals" class="form-control @error('goals') is-invalid @enderror" required>{{ old('goals', $project->goals) }}</textarea>
                            @error('goals')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="vision" class="form-label">{{ __('Vision') }}</label>
                    <textarea name="vision" id="vision" class="form-control @error('vision') is-invalid @enderror" required>{{ old('vision', $project->vision) }}</textarea>
                    @error('vision')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="priority" class="form-label">{{ __('Priority') }}</label>
                        <input type="number" name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ old('priority', $project->priority) }}" required>
                        @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="type" class="form-label">{{ __('Type') }}</label>
                        <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type', $project->type) }}" required>
                        @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="budget" class="form-label">{{ __('Budget') }}</label>
                        <input type="number" name="budget" id="budget" class="form-control @error('budget') is-invalid @enderror" step="0.01" value="{{ old('budget', $project->budget) }}" required>
                        @error('budget')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="parent_id" class="form-label">{{ __('Parent Project') }}</label>
                        <!-- Assuming you have a form field for selecting the parent project -->
                        <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                            <option value="">{{__('Parent Project')}}</option>
                            @foreach($projects as $parentProject)
                            <option value="{{$parentProject->id}}" {{ $parentProject->id == old('parent_id', $project->parent_id) ? 'selected' : '' }}>
                                {{$parentProject->title}}
                            </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status_id" class="form-label">{{ __('Status') }}</label>
                        <!-- Assuming you have a form field for selecting the parent project -->
                        <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror">
                            @foreach($statuses as $status)
                            <option value="{{$status->id}}" {{ $status->id == old('status_id', $project->status_id) ? 'selected' : '' }}>
                                {{__($status->name)}}
                            </option>
                            @endforeach
                        </select>
                        @error('status_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </form>

        </div>
    </div>

</div>
@endsection

@section('scripts')
@endsection