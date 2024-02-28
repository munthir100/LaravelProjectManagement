@extends('layouts.shared.app-layout')

@section('title')
    @include("layouts.shared.includes.title-meta", ["title" => __('Security')])
@endsection

@section('styles')
    <!-- Additional styles for this page -->
    <style>
        /* Add custom styles if needed */
    </style>
@endsection

@section('page-title')
    @include("layouts.shared.includes.page-title", ["pagetitle" => __('Account'), "title" => __('Security')])
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <span>{{ __('Change Password') }}</span>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('account.security.update') }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="old_password">{{ __('Old Password') }}</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password">{{ __('New Password') }}</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">{{ __('Update Password') }}</button>
                </form>
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
