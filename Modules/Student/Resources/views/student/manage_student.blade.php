@extends('student::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Student List</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div col-4>
            <a class="btn btn-primary" href="{{ route('student.add') }}" role="button">Create New </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" id="product-table">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
            </thead>
            @foreach ($students as $student)
              <tbody>
                <tr>
                  <td>{{ $student->fullname }}</td>
                  <td>{{ $student->address }}</td>
                  <td>{{ $student->phone_number }}</td>
                  <td><img src="{{$student->student_image}}" alt="{{$student->fullname}}" width="50px" height="50px"></td>
                  <td>
                    <span>
                      <a href="{{ route('student.edit',['id' => $student->id]) }}"><i class="fas fa-edit"></i></a>
                    </span>
                    <span>
                      <form method="POST" action="{{route('student.delete')}}" class="delete-item">
                        @csrf
                        <input type="hidden" name="id" value="{{$student->id}}">
                        <button type="submit" onClick="return confirm('Are you sure want to delete student date?')" class="btn-sm btn-danger" >
                        <i class="fa fa-trash"></i>
                        </button>
                     </form>
                    </span>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>
<!-- /.content-wrapper -->

@endsection