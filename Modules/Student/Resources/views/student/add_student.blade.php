@extends('student::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <div class="content-wrapper">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Student Categories</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="productName">Student Fullname</label>
            <input type="text" class="form-control" placeholder="Enter Student Name" name="fullname">
            @error('name')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="price">Address</label>
            <input type="text" class="form-control" placeholder="Enter Student Address" name="address">
            @error('address')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="productDescription">Phone Number</label>
            <input type="text" class="form-control" placeholder="Enter Student Phone Number" name="phone_number">
            @error('number')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
          <label for="image">Student Profile Photo</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name="student_image">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            @error('image')
            <p class="text-danger">{{ $message }} </p>
            @enderror
          </div>
        <div class="card-footer">
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