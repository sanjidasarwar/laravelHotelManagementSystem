@php
    $id = Auth::user()->id;
    $profileDetails = App\Models\User::find($id);
@endphp

<div class="service-side-bar">
    <div class="services-bar-widget">
        <h3 class="title">User Info</h3>
        <div class="side-bar-categories">
            {{-- <img src="{{asset("frontend/assets/img/blog/blog-profile1.jpg")}}" class="rounded mx-auto d-block" alt="Image"
                style="width:100px; height:100px;"> <br><br> --}}
            <img src="{{ !empty($profileDetails->photo) ? url('upload/user/' . $profileDetails->photo) : url('upload/no_image.jpg') }}"
                alt="User" class="rounded mx-auto d-block" width="110">
            <div class="mt-3">
                <h3 class="text-center">{{ $profileDetails->name }}</h3>
                <h5 class="text-center">{{ $profileDetails->email }}</h5>
                <ul>

                    <li>
                        <a href="{{route('dashboard')}}">User Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('user.profile')}}">User Profile </a>
                    </li>
                    <li>
                        <a href="#">Change Password</a>
                    </li>
                    <li>
                        <a href="#">Booking Details </a>
                    </li>
                    <li>
                        <a href="#">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
