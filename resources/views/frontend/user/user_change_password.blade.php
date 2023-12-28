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
                                <form action="{{route('user.password.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                          <h3 class="title">Change Password</h3>
                
                                          <div class="row">

                                            <div class="col-lg-12 col-md-12">
                                              <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" id="old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror"  />
                                                @error('old_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                              <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"  />
                                                @error('new_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                              <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                                                @error('confirm_password')
                                                <span class="text-danger">{{$message}}</span>
                                                 @enderror
                                              </div>
                                            </div>
                
                                            <button type="submit" class="btn btn-danger">
                                              Save Changes
                                            </button>
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

@endsection
