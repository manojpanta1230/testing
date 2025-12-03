@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Team Member</h2>

    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- Position --}}
        <div class="mb-3">
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control">
        </div>

        {{-- Photo --}}
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        {{-- Bio --}}
        <div class="mb-3">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="4"></textarea>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        {{-- Phone --}}
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        {{-- LinkedIn --}}
        <div class="mb-3">
            <label class="form-label">LinkedIn</label>
            <input type="text" name="linkedin" class="form-control">
        </div>

        {{-- Twitter --}}
        <div class="mb-3">
            <label class="form-label">Twitter</label>
            <input type="text" name="twitter" class="form-control">
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Create Team Member</button>
    </form>
</div>
@endsection
