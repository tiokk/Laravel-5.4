@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Register</h1>
            <hr>
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
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
				<div class="form-group">
                    <label for="email">Password:</label>
					<input type="password" class="form-control" id="password" name="password">                
				</div>
				<div class="form-group">
                    <label for="email">Password confirmation:</label>
					<input type="password" class="form-control" id="confirmation" name="confirmation">                
                </div>
                <div class="form-group">
                    <label for="dob">Date Of Birth:</label>
					    <input class="date form-control" type="text" id="dateOfBirth" name="dateOfBirth">>
                 </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text"  class="form-control" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>

                </div>
<a href="/"> __Back To Login</a>
            </form>
        </div>
        <!-- /.content -->
    </section>
	
    <!-- /.main-section -->
@endsection