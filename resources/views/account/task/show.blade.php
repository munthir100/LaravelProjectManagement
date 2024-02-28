@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => "Task Details"])
@endsection

@section('styles')
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => "Account", "title" => "Tasks > Details"])
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{ __('Task Details') }}</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $task->title }}</h5>

        <div class="mb-3">
            <strong>{{ __('Description') }}:</strong>
            <p class="card-text">{{ $task->description }}</p>
        </div>

        <div class="mb-3">
            <strong>{{ __('Priority') }}:</strong>
            <p class="card-text">{{ $task->priority }}</p>
        </div>

        <div class="mb-3">
            <strong>{{ __('Progress Percentage') }}:</strong>
            <p class="card-text">{{ $task->progress_percentage }}</p>
        </div>

        <div class="mb-3">
            <strong>{{ __('Deadline') }}:</strong>
            <p class="card-text">{{ $task->deadline }}</p>
        </div>

        <div class="mb-3">
            <strong>{{ __('Status') }}:</strong>
            <p class="card-text">{{ $task->status->name }}</p>
        </div>

        <div class="mb-3">
            <strong>{{ __('Project') }}:</strong>
            <p class="card-text">{{ $task->project->title }}</p>
        </div>

        <!-- Add more details based on your task model attributes -->

        <a href="{{ route('account.tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">{{ __('Edit Task') }}</a>
    </div>
</div>

@endsection

@section('scripts')
<!-- Additional scripts for this page -->
<!-- Add your custom scripts here if needed -->
@endsection