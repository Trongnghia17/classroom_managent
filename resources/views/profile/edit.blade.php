@extends('layouts.app')

@section('title', 'Chỉnh Sửa Hồ Sơ')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Chỉnh Sửa Hồ Sơ</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 text-center">
                            <div class="avatar-upload">
                                <div class="avatar-preview mb-3">
                                    @php
                                        $imagePath = $user->profile_image && Storage::disk('public')->exists($user->profile_image)
                                            ? asset('storage/' . $user->profile_image)
                                            : asset('assets/images/avatar/default.png');
                                    @endphp
                                    <img src="{{ $imagePath }}"
                                         class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;"
                                         id="imagePreview" alt="Ảnh hồ sơ">
                                </div>
                                <div class="avatar-edit">
                                    <label for="profile_image" class="btn btn-sm btn-outline-primary">Cập nhật ảnh</label>
                                    <input type="file" id="profile_image" name="profile_image" class="d-none" accept="image/*" onchange="showPreview(event)">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-secondary">Cập nhật hồ sơ</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function showPreview(event) {
            if(event.target.files.length > 0) {
                const src = URL.createObjectURL(event.target.files[0]);
                const preview = document.getElementById("imagePreview");
                preview.src = src;
            }
        }
    </script>
@endsection
