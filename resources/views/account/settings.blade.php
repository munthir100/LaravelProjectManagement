@extends('layouts.shared.app-layout')

@section('title')
@include("layouts.shared.includes.title-meta", ["title" => __('Settings')])
@endsection

@section('styles')
<!-- Additional styles for this page -->
<style>
    /* Add custom styles if needed */
</style>
@endsection

@section('page-title')
@include("layouts.shared.includes.page-title", ["pagetitle" => __('Account'), "title" => __('Settings')])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <span>{{ __('Update Settings') }}</span>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form method="POST" action="{{ route('account.settings.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $account->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" class="form-control" value="{{ $account->email }}" disabled>
                        </div>

                        {{-- Other fields and buttons for update... --}}

                        <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Additional scripts for this page -->
<script>
    // Add custom scripts if needed
</script>
@endsection