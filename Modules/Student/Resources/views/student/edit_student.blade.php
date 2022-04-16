@extends('student::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <div class="content-wrapper">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Student</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('student.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="productName">Student Name</label>
            <input type="text" class="form-control" value="{{ $student->fullname }}" name="fullname">
          </div>
          <div class="form-group">
            <label for="price">Address</label>
            <input type="text" class="form-control" value="{{ $student->address }}" name="address">
          </div>
          <div class="form-group">
            <label for="productDescription">Phone Number</label>
            <input type="text" class="form-control" value="{{ $student->phone_number }}" name="phone_number">
          </div>
          <label for="image">Your Image Here</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name="student_image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            <img src="{{ $student->student_image }}" width="40px" height="40px" alt="">
          </div>
        <div class="card-footer">
          @csrf
          <input type="hidden" name="id" value="{{ $student->id }}">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      @if (session('status'))
      <h6 class="alert alert-success">{{ session('status') }}</h6>
      @endif
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection