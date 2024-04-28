@extends('admin.admin_dashboard');
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div>
        <div class="ms-auto">
            <div class="col">
                <a href="{{route('room.type.add')}}" type="button" class="btn btn-outline-primary radius-30 mb-3">Add Room Type
                </a>
            </div>
        </div>
    </div>
    <h6 class="mb-0 text-uppercase">All Room Type</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roomType as $key=>$roomType)   
                        <tr>
                            <td>{{$key+1}}</td>
                            <td></td>
                            <td>{{$roomType->name}}</td>
                            <td class="d-flex">
                                <div class="col">
                                    <a href="{{route('room.type.edit', $roomType->id)}}" type="button" class="btn btn-warning radius-30 me-2">
                                        Edit
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="{{route('room.type.delete', $roomType->id)}}" type="button" class="btn btn-danger radius-30" id="delete">Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!--data table js-->
    <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
@endsection
