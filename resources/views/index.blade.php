@extends('base')
@section('content')

	
	<div class="content">
            <!-- Remove This Before You Start -->
            <h1>Laravel 5.4</h1>
            <p>Hallo, {{Session::get('name')}}</p>
            <p>Hallo, {{Session::get('login')}}</p>

            <p>* FileURL : {{ $data->fileurl }} <a href="{{ $data->fileurl }}" target="_blank">Open</a></p>
            <a href="/logout" class="btn btn-primary btn-lg">Logout</a>

        </div>
		<hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Of Birth</th>
                    <th>Address</th>
                    <th>FileURL</th>
                </tr>
                </thead>
                <tbody>
 
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->dob }}</td>
                        <td>{{ $data->add }}</td>
                        <td>{{ $data->fileurl }}</td>
                            
                        </td>
                    </tr>
                 </tbody>
            </table>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection