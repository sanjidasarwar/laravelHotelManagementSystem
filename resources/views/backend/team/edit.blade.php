@extends('admin.admin_dashboard');
@section('admin')
    <h5 class="mb-4">Add Team</h5>
    <form action="{{route('team.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" id="name" value="{{$team->name}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="position" class="col-sm-3 col-form-label">Position</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="position" id="position" value="{{$team->position}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
            <div class="col-sm-9">
                <input type="url" class="form-control" name="facebook" id="facebook" value="{{$team->position}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="twitter" id="twitter" value="{{$team->twitter}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="instagram" id="instagram" value="{{$team->instagram}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pinterest" class="col-sm-3 col-form-label">Pinterest</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pinterest" id="pinterest" value="{{$team->pinterest}}">
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="input40" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
                <input id="uploadImg" type="file" name="image" class="form-control" onchange="previewImage(event)"/>
            </div>
        </div>
        <div class="row mb-3">
            <label for="input40" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
                <img id="preview" src="{{!empty($team->image) ? url($team->image) : url('upload/no_image.jpg')}}" alt="team" class="rounded-circle p-1 bg-primary" width="80">
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    const previewImg = document.getElementById('preview');
                    previewImg.src = e.target.result;
                };
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
