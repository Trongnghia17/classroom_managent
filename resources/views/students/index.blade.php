@extends('layouts.app')

@section('title', 'Học sinh')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- card -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('students.create') }}" class="btn btn-primary me-2">+ Thêm học sinh</a>
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
                            <a href="#!" class="btn btn-light me-1">Import</a>
                            <a href="#!" class="btn btn-light">Export</a>
                        </div>
                        <form action="{{ route('students.index') }}" method="GET" class="row">
                            <div class="col-lg-4 col-md-6">
                                <input type="search" name="search" class="form-control" placeholder="Search for student, email, phone..." value="{{ request('search') }}">
                            </div>
                            <div class="col-lg-2 col-md-6 mt-3 mt-md-0">
                                <select name="classroom_id" class="form-select" onchange="this.form.submit()">
                                    <option value="">All Classrooms</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}" {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                            {{ $classroom->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-6 mt-3 mt-lg-0">
                                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
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
                                <th class="ps-1">Học sinh</th>
                                <th>Lớp học</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Ngày tháng năm sinh</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($students->count() > 0)
                                @foreach($students as $student)
                                    <tr>
                                        <td class="pe-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="student{{ $student->id }}">
                                                <label class="form-check-label" for="student{{ $student->id }}"></label>
                                            </div>
                                        </td>
                                        <td class="ps-1">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm rounded-circle bg-light d-flex align-items-center justify-content-center">
                                                    <span class="text-primary fw-bold">{{ substr($student->name, 0, 1) }}</span>
                                                </div>
                                                <div class="ms-2">
                                                    <h5 class="mb-0">
                                                        <a href="{{ route('students.edit', $student) }}" class="text-inherit">{{ $student->name }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $student->classroom->name ?? 'N/A' }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone ?? 'N/A' }}</td>
                                        <td>{{ $student->date_of_birth ? date('m/d/Y', strtotime($student->date_of_birth)) : 'N/A' }}</td>
                                        <td>{{ $student->created_at->format('m/d/Y') }}</td>
                                        <td>
                                            <a href="{{ route('students.edit', $student) }}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="edit{{ $student->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                                <div id="edit{{ $student->id }}" class="d-none">
                                                    <span>Edit</span>
                                                </div>
                                            </a>
                                            <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trash{{ $student->id }}"
                                               onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this student?')) document.getElementById('delete-form-{{ $student->id }}').submit();">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                                <div id="trash{{ $student->id }}" class="d-none">
                                                    <span>Delete</span>
                                                </div>
                                            </a>
                                            <form id="delete-form-{{ $student->id }}" action="{{ route('students.destroy', $student) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="alert alert-info mb-0">
                                            Không tìm thấy học sinh nào. <a href="{{ route('students.create') }}" class="alert-link">Thêm học sinh đầu tiên</a>.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                        <!-- Replace the current pagination div with this enhanced version -->
                        <div class="d-flex justify-content-between align-items-center mt-8 flex-wrap">
                            <div class="mb-2">
                                Hiển thị {{ $students->firstItem() ?? 0 }}-{{ $students->lastItem() ?? 0 }} trên tổng số {{ $students->total() ?? 0 }} học sinh
                            </div>
                            <div class="mb-2">
                                {{ $students->onEachSide(1)->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
