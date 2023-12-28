@extends('frontend.frontend_dashboard')

@section('main')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg6">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>User Dashboard </li>
                </ul>
                <h3>User Dashboard</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.user.user_menu')
                </div>


                <div class="col-lg-9">
                    <div class="service-article">


                        <section class="checkout-area pb-70">
                            <div class="container">
                                <form action="{{route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-details">
                                                <h3 class="title">User Profile </h3>

                                                <div class="row">

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" name="name" class="form-control" value="{{$profileDetails->name}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <input type="email" name="email" class="form-control" value="{{$profileDetails->email}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control" value="{{$profileDetails->address}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone <span class="required">*</span></label>
                                                            <input type="text" name="phone" class="form-control" value="{{$profileDetails->phone}}">
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Photo <span class="required">*</span></label>
                                                            <input id="uploadImg" type="file" name="photo" class="form-control" onchange="previewImage(event)"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <img id="preview" src="{{!empty($profileDetails->photo) ? url('upload/user_images/'.$profileDetails->photo) : url('upload/no_image.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-danger">Save Changes </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </section>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

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
