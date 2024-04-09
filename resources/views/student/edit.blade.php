@extends('layouts.main')

@section('contant')
@foreach ($student as $item)

<form action="{{route('student.update',$item->id)}}" method="POST">
    @method('put')
    @csrf
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="card col-lg-5 col-md-7 col-sm-9">
            <div class="card-body">
                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="firstName" value="{{$item->firstName}}" class="form-control" required>
                    @error('firstName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="lastName" value="{{$item->lastName}}" class="form-control" required>
                    @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" value="{{$item->dob}}" class="form-control" required>
                    @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender"  class="form-control" required>

                        <option value="{{$item->gender}}">{{$item->gender}}</option>
                        <option value="Male">Male</option>
                        <option value="Female">FeMale</option>
                        <option value="Others">Others</option>
                    </select>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer bg-white">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#contactModal">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Add Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" name = "email" value="{{$item->email}}" class="form-control" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="number" name = "phoneNumber" value="{{$item->phoneNumber}}" class="form-control" required>
                    @error('phoneNumber') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>City</label>
                    <input type="text" name = "city" value="{{$item->city}}" class="form-control" required>
                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>State</label>
                    <input type="text" name = "state" value="{{$item->state}}" class="form-control" required>
                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Zipcode</label>
                    <input type="number" name = "zipcode" value="{{$item->zipcode}}" class="form-control" required>
                    @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal">Back</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#marksModal">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="marksModal" tabindex="-1" aria-labelledby="marksModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="marksModalLabel">Add Marks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Marathi</label>
                    <input type="number" name = "marathi" value="{{$item->marathi}}" class="form-control" required>
                    @error('marathi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>English</label>
                    <input type="number" name = "english" value="{{$item->english}}" class="form-control" required>
                    @error('english') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Hindi</label>
                    <input type="number" name = "hindi" value="{{$item->hindi}}" class="form-control" required>
                    @error('hindi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Math</label>
                    <input type="number" name = "math" value="{{$item->math}}" class="form-control" required>
                    @error('math') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Science</label>
                    <input type="number" name = "science" value="{{$item->science}}" class="form-control" required>
                    @error('science') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">
                    Back
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#departmentModal">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Department Name</label>
                    <input type="text" name = "deptName" value="{{$item->deptName}}" class="form-control" required>
                    @error('deptName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Standard</label>
                    <input type="text" name = "std" value="{{$item->std}}" class="form-control" required>
                    @error('std') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Division</label>
                    <input type="text" name = "division" value="{{$item->division}}" class="form-control" required>
                    @error('division') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Roll Number</label>
                    <input type="text" name = "rollNo" value="{{$item->rollNo}}" class="form-control" required>
                    @error('rollNo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#marksModal">
                    Back
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
    
@endforeach

@endsection