@extends('admin.admin_dashboard');
@section('admin')
<div>
    <div class="ms-auto">
        <button type="button" class="btn btn-outline-primary"><i class="bx bx-user me-0"></i>
        </button>
    </div>
</div>
<h6 class="mb-0 text-uppercase">All Team</h6>
<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Instagram</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary"><i class="bx bx-blanket me-0"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger"><i class="bx bx-blanket me-0"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


 @endsection