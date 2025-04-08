<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Dashboard</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <h5>Classrooms</h5>
                                    <p class="display-4">{{ \App\Models\Classroom::count() }}</p>
                                    <a href="{{ route('classrooms.index') }}" class="btn btn-primary">Manage Classrooms</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <h5>Students</h5>
                                    <p class="display-4">{{ \App\Models\Student::count() }}</p>
                                    <a href="{{ route('students.index') }}" class="btn btn-primary">Manage Students</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
