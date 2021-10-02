@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/registerPost') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Username">Username:</label>
                    <input type="username" class="form-control" id="usrname" name="usrname">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <div class="form-group">
                    <label for="alamat">Password Confirmation:</label>
                    <input type="password" class="form-control" id="confirmation" name="confirmation">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
</form>
