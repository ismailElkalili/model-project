<!DOCTYPE html>
<html lang="en">
@include('auth.library-header-script.header')

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Moddle</b>System</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new Teacher</p>

                <form method="POST" action="{{ URL('register/teacher') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>
                    @error('name')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    @error('email')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('password')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('password_confirmation')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="date" name="dob" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    @error('dob')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            placeholder="Enter Phone Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>

                    </div>
                    @error('phone_number')
                        <div class="text-danger" style="font-size: 12px; ">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        @error('gender')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                <hr>{{ $message }}
                            </div>
                        @enderror
                        <select class="form-control custom-select" name="gender" id="gender">
                            <option value=0>Male</option>
                            <option value=1>Female</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        @error('levelID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <select class="form-control custom-select" name="levelID" id="levelID">
                            @foreach ($levels as $item)
                                <option value={{ $item->id }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        @error('levelID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <select class="form-control custom-select" name="qualification" id="qualification">
                            <option value="bachelor">bachelor</option>
                            <option value="master">Master</option>
                            <option value="phd">Phd</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label>uplaod your profile image</label>
                        <input type="file" name="image" placeholder="uplaod your image profile" />
                        <span class="sr-only">uplaod your profile image</span>
                        @error('image')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12 " style="text-align: center;align-content: center">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a style="text-align: center;font-size: 15px" href="{{ route('login') }}">
                    I have an Account
                </a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    @include('auth.library-header-script.scripts')
</body>

</html>
