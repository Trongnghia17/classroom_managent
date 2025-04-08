<!-- resources/views/classrooms/index.blade.php -->
@extends('layouts.app')

@section('title', 'Lớp Học')

@section('content')
    <div class="row" >
        <div class="col-12" style="width: 100% !important;">
            <!-- card -->
            <div class="card mb-4">
                <div class="card-header">
                    <!-- resources/views/classrooms/index.blade.php (Search form modification) -->
                    <div class="row justify-content-between">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('classrooms.create') }}" class="btn btn-primary me-2">+ Thêm Lớp Học</a>
                        </div>
                        <div class="col-md-6 text-lg-end mb-3">
                            <a href="#!" class="btn btn-light me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </a>
                            <a href="#!" class="btn btn-light me-1">Nhập</a>
                            <a href="#!" class="btn btn-light">Xuất</a>
                        </div>
                        <form action="{{ route('classrooms.index') }}" method="GET" class="row">
                            <div class="col-lg-4 col-md-6">
                                <input type="search" name="search" class="form-control" placeholder="Tìm kiếm lớp học, cấp lớp, sức chứa..." value="{{ request('search') }}">
                            </div>
                            <div class="col-lg-2 col-md-6 mt-3 mt-md-0">
                                <select name="grade_level" class="form-select" aria-label="Default select example">
                                    <option value="">Cấp Lớp</option>
                                    <option value="Tiểu học" {{ request('grade_level') == 'Tiểu học' ? 'selected' : '' }}>Tiểu học</option>
                                    <option value="Trung học cơ sở" {{ request('grade_level') == 'Trung học cơ sở' ? 'selected' : '' }}>Trung học cơ sở</option>
                                    <option value="Trung học phổ thông" {{ request('grade_level') == 'Trung học phổ thông' ? 'selected' : '' }}>Trung học phổ thông</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6 mt-3 mt-lg-0">
                                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                            </div>
                            @if(request('search') || request('grade_level'))
                                <div class="col-lg-2 col-md-6 mt-3 mt-lg-0">
                                    <a href="{{ route('classrooms.index') }}" class="btn btn-secondary w-100">Xóa bộ lọc</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table text-nowrap mb-0 table-centered table-hover">
                            <thead class="table-light">
                            <tr>
                                <th class="pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="ps-1">Lớp Học</th>
                                <th>Cấp Lớp</th>
                                <th>Sức Chứa</th>
                                <th>Học Sinh</th>
                                <th>Ngày Tạo</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classrooms as $classroom)
                                <tr>
                                    <td class="pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="classroom{{ $classroom->id }}">
                                            <label class="form-check-label" for="classroom{{ $classroom->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm rounded-circle bg-light d-flex align-items-center justify-content-center">
                                                <span class="text-primary fw-bold">{{ substr($classroom->name, 0, 1) }}</span>
                                            </div>
                                            <div class="ms-2">
                                                <h5 class="mb-0">
                                                    <a href="{{ route('classrooms.show', $classroom) }}" class="text-inherit">{{ $classroom->name }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $classroom->grade_level }}</td>
                                    <td>{{ $classroom->capacity }}</td>
                                    <td>{{ $classroom->students->count() }}</td>
                                    <td>{{ $classroom->created_at->format('m/d/Y') }}</td>
                                    <td>
                                        @if($classroom->students->count() < $classroom->capacity)
                                            <span class="badge badge-success-soft text-success">Còn Chỗ</span>
                                        @else
                                            <span class="badge badge-danger-soft text-danger">Đầy</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('classrooms.show', $classroom) }}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="view{{ $classroom->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-xs">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            <div id="view{{ $classroom->id }}" class="d-none">
                                                <span>Xem</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('classrooms.edit', $classroom) }}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="edit{{ $classroom->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            <div id="edit{{ $classroom->id }}" class="d-none">
                                                <span>Sửa</span>
                                            </div>
                                        </a>
                                        <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trash{{ $classroom->id }}"
                                           onclick="event.preventDefault(); if(confirm('Bạn có chắc chắn?')) document.getElementById('delete-form-{{ $classroom->id }}').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            <div id="trash{{ $classroom->id }}" class="d-none">
                                                <span>Xóa</span>
                                            </div>
                                        </a>
                                        <form id="delete-form-{{ $classroom->id }}" action="{{ route('classrooms.destroy', $classroom) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-8 mb-2">
                        <div>
                            Hiển thị {{ $classrooms->firstItem() ?? 0 }}-{{ $classrooms->lastItem() ?? 0 }} trên {{ $classrooms->total() }} lớp học
                        </div>
                        <div>
                            {{ $classrooms->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
