<x-layouts.app>


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid" style="padding-top: 100px;">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Change Password</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul id="validation_errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{url('settings/update-password')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Old password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->
</x-layouts.app>
