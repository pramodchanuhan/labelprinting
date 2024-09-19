<x-layouts.app>

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">
            <section class="content">
                <div class="card">
                    <div class="card-body">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Employee</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Employee</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('employees-store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                                        @error('f_name')
                                        <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Last Name</label>
                                        <input class="form-control" type="text" name="l_name" value="{{ old('l_name') }}" required>
                                        @error('l_name')
                                        <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" value="{{ old('username') }}">
                                        @error('username')
                                        <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone</label>
                                        <input class="form-control" type="tel" id="mobile_no" name="mobile_no" value="" required
                                            pattern="\d{10}" maxlength="10" minlength="10">
                                        @error('mobile_no')
                                        <span id="mobileError" style="color: red; display: none;">Please enter exactly 10 digits</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Create Password</label>
                                        <input class="form-control" type="password" name="password" required>
                                        @error('password')
                                        <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Confirm Password</label>
                                        <input class="form-control" type="password" name="password_confirmation" required>
                                        @error('password_confirmation')
                                        <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Role</label>
                                        <select class="form-control" name="role" required>
                                            <option hidden disabled selected>Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
        </div>
        </section>
    </div>

    @section('page-level-script')
    <script>
        document.getElementById('mobile_no').addEventListener('input', function() {
            var mobileInput = this;
            var errorSpan = document.getElementById('mobileError');

            if (mobileInput.validity.patternMismatch || mobileInput.value.length !== 10) {
                errorSpan.style.display = 'inline';
            } else {
                errorSpan.style.display = 'none';
            }
        });
    </script>
    @endsection

</x-layouts.app>