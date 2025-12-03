@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Team Member</h2>

    <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
        </div>

        {{-- Position --}}
        <div class="mb-3">
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control" value="{{ $team->position }}">
        </div>

        {{-- Existing Photo --}}
        @if($team->photo)
            <div class="mb-3">
                <label class="form-label">Current Photo</label><br>
                <img src="{{ asset('storage/' . $team->photo) }}" width="120" class="mb-2" alt="">
            </div>
        @endif

        {{-- New Photo --}}
        <div class="mb-3">
            <label class="form-label">Change Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        {{-- Bio --}}
        <div class="mb-3">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="4">{{ $team->bio }}</textarea>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $team->email }}">
        </div>

        {{-- Phone --}}
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $team->phone }}">
        </div>

        {{-- LinkedIn --}}
        <div class="mb-3">
            <label class="form-label">LinkedIn</label>
            <input type="string" name="linkedin" class="form-control" value="{{ $team->linkedin }}">
        </div>

        {{-- Twitter --}}
        <div class="mb-3">
            <label class="form-label">Twitter</label>
            <input type="string" name="twitter" class="form-control" value="{{ $team->twitter }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
