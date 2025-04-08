<!-- resources/views/classrooms/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Chỉnh Sửa Lớp Học')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chỉnh Sửa Lớp Học</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('classrooms.update', $classroom) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Tên Lớp Học</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $classroom->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="grade_level" class="form-label">Cấp Lớp</label>
                    <input type="text" class="form-control @error('grade_level') is-invalid @enderror" id="grade_level" name="grade_level" value="{{ old('grade_level', $classroom->grade_level) }}" required>
                    @error('grade_level')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Sức Chứa</label>
                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value="{{ old('capacity', $classroom->capacity) }}">
                    @error('capacity')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô Tả</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $classroom->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Cập Nhật Lớp Học</button>
                <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
