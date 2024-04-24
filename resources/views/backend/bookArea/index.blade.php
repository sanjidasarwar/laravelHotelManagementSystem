@extends('admin.admin_dashboard');
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <h5 class="mb-4">Add Team</h5>
    <form id="teamForm" action="{{ route('book.area.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$book->id}}">

        <div class="row mb-3">
            <label for="main_title" class="col-sm-3 col-form-label">Main Title</label>
            <div class="col-sm-9 form-group">
                <input type="text" class="form-control" name="main_title" id="main_title" value="{{$book->main_title}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="short_title" class="col-sm-3 col-form-label">Short Title</label>
            <div class="col-sm-9 form-group">
                <input type="text" class="form-control" name="short_title" id="short_title" value="{{$book->short_title}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9 form-group">
                <input type="text" class="form-control" name="description" id="description" value="{{$book->description}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="btn_url" class="col-sm-3 col-form-label">Btn Url</label>
            <div class="col-sm-9 form-group">
                <input type="text" class="form-control" name="btn_url" id="btn_url" value="{{$book->btn_url}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="input40" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9 form-group">
                <input id="uploadImg" type="file" name="image" class="form-control" onchange="previewImage(event)" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="input40" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <img id="preview" src="{{!empty($book->image) ? url($book->image) : url('upload/no_image.jpg')}}" alt="book area" class="rounded-circle p-1 bg-primary" width="80">
            </div>
        </div>
        <div class="row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9 form-group">
                <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#teamForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    position: {
                        required: true,
                    },
                    facebook: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                    position: {
                        required: 'Please Enter Team Postion',
                    },
                    facebook: {
                        required: 'Please Enter Facebook Url',
                    },
                    image: {
                        required: 'Please Select Image',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewImg = document.getElementById('preview');
                    previewImg.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
