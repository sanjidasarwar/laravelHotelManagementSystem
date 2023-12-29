@extends('admin.admin_dashboard');
@section('admin')
    <div>
        <div class="ms-auto">
            <div class="col">
                <a href="{{route('team.add')}}" type="button" class="btn btn-outline-primary"><i class="bx bx-user me-0"></i>
                </a>
            </div>
        </div>
    </div>
    <h6 class="mb-0 text-uppercase">All Team</h6>
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
                            <th>Position</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                            <th>Pinterest</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $key=>$item)   
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset($item->image)}}" alt="" class="w-75 h-75"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->position}}</td>
                            <td>{{$item->facebook}}</td>
                            <td>{{$item->twitter}}</td>
                            <td>{{$item->instagram}}</td>
                            <td>{{$item->pinterest}}</td>
                            <td>
                                <div class="col">
                                    <a href="{{route('team.edit', $item->id)}}" type="button" class="btn btn-outline-primary"><i
                                            class="bx bx-blanket me-0"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="{{route('team.delete', $item->id)}}" type="button" class="btn btn-outline-danger" id="delete"><i class="bx bx-blanket me-0"></i>
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
@endsection
