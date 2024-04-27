@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => "Project Details"])
@endsection
@section('styles')
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => "Account", "title" => "Projects > Show"])
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>{{__('Project Details')}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text"><strong>{{ __('Short Description') }}:</strong> {{ $project->short_description }}</p>
            <p class="card-text"><strong>{{ __('Number of Team Members') }}:</strong> {{ $project->number_of_team_members }}</p>
            <p class="card-text"><strong>{{ __('Deadline') }}:</strong> {{ $project->deadline }}</p>
            <p class="card-text"><strong>{{ __('Description') }}:</strong> {{ $project->description }}</p>
            <p class="card-text"><strong>{{ __('Goals') }}:</strong> {{ $project->goals }}</p>
            <p class="card-text"><strong>{{ __('Vision') }}:</strong> {{ $project->vision }}</p>
            <p class="card-text"><strong>{{ __('Priority') }}:</strong> {{ $project->priority }}</p>
            <p class="card-text"><strong>{{ __('Type') }}:</strong> {{ $project->type }}</p>
            <p class="card-text"><strong>{{ __('Progress Percentage') }}:</strong> {{ $project->progress_percentage }}%</p>
            <p class="card-text"><strong>{{ __('Budget') }}:</strong> ${{ $project->budget }}</p>
            <p class="card-text"><strong>{{ __('Status') }}:</strong> {{ __($project->status->name) }}</p>
            <p class="card-text"><strong>{{ __('Parent Project') }}:</strong> {{ $project->parentProject ? $project->parentProject->title : __('None') }}</p>

            <!-- You can add more details based on your project model attributes -->

            <a href="{{ route('account.projects.edit', ['project' => $project->id]) }}" class="btn btn-primary">{{ __('Edit Project') }}</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection