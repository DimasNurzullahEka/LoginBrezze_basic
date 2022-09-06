@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-lg-6">
                        <div class="card"><br><br>
                            <center><img class="rounded-circle avatar-xl" src="{{(!empty($DataAdmin->foto_profile))? url('upload/foto_admin/'
                            .$DataAdmin->foto_profile):url('upload/no_image.jpg')}}" alt="Card image cap"></center>
                            <div class="card-body">
                                <h5 class="card-title">Nama: {{ $DataAdmin->name}}</h5><hr>
                                <h4 class="card-title">User Email: {{ $DataAdmin->email}}</h4><hr>
                                <h4 class="card-title">userName: {{ $DataAdmin->username}}</h4><hr>
                                <a href="{{route('edit.profile')}}" class="btn btn-primary w-xs waves-effect waves-light">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
     </div>
</div>









@endsection
