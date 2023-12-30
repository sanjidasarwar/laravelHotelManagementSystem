@extends('admin.admin_dashboard');
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <h5 class="mb-4">Add Team</h5>
    <form id="teamForm" action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9 form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="position" class="col-sm-3 col-form-label">Position</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="position" id="position" placeholder="Position">
            </div>
        </div>
        <div class="row mb-3">
            <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
            <div class="col-sm-9">
                <input type="url" class="form-control" name="facebook" id="facebook" placeholder="Facebook URL">
            </div>
        </div>
        <div class="row mb-3">
            <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter URL">
            </div>
        </div>
        <div class="row mb-3">
            <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram URL">
            </div>
        </div>
        <div class="row mb-3">
            <label for="pinterest" class="col-sm-3 col-form-label">Pinterest</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pinterest" id="pinterest" placeholder="Pinterest URL">
            </div>
        </div>

        <div class="row mb-3">
            <label for="input40" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
                <input id="uploadImg" type="file" name="image" class="form-control" onchange="previewImage(event)" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="input40" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
                <img id="preview" src="{{ url('upload/no_image.jpg') }}" alt="team"
                    class="rounded-circle p-1 bg-primary" width="80">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#teamForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    postion: {
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
                    postion: {
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
