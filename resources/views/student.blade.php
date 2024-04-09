@extends('layouts.main')


@section('contant')


@include('student.create')
{{-- @include('student.edit') --}}

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Student Information
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">
                            Add Student
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">First Name</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Last Name</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Date Of Birth</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Gender</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Email</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Phone Number</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">City</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">State</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Zipcode</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Marathi</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">English</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Hindi</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">math</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Science</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Department Name</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Standard</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Division</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2">Roll Number</th>
                                    <th class="col-lg-2 col-md-2 col-sm-2 col-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($student->count()>0)
                                @foreach($student as $value)
                                <tr>
                                    {{-- <td>{{$student}} --}}
                                    <td>{{$value->firstName}}</td>
                                    <td>{{$value->lastName}}</td>
                                    <td>{{$value->dob}}</td>
                                    <td>{{$value->gender}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->phoneNumber}}</td>
                                    <td>{{$value->city}}</td>
                                    <td>{{$value->state}}</td>
                                    <td>{{$value->zipcode}}</td>
                                    <td>{{$value->marathi}}</td>
                                    <td>{{$value->english}}</td>
                                    <td>{{$value->hindi}}</td>
                                    <td>{{$value->math}}</td>
                                    <td>{{$value->science}}</td>
                                    <td>{{$value->deptName}}</td>
                                    <td>{{$value->std}}</td>
                                    <td>{{$value->division}}</td>
                                    <td>{{$value->rollNo}}</td>
                                    <td class="text-center">
                                        <a href="{{route('student.edit', $value->id)}}"><button class="btn btn-primary"> Edit</button></a>
                                        {{-- {{route('slider.edit',$value->id)}} --}}
                                         <form action="{{route('student.destroy',$value->id)}}" class= "action" method="POST"> @csrf  @method('DELETE') <button class="btn btn-danger mt-1 mt-md-1 ms-sm-1">Delete</button></form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="19"><h2 class="text-center">There are no data.</h2></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- {!! $student->links() !!}   --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection