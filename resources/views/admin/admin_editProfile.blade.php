@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Form Edit Profile</h4>
                        <form method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nama:</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{$EditData->name}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Email:</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="text" value="{{$EditData->email}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">userName: </label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" value="{{$EditData->username}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                                <div class="col-sm-10">
                                    <input name="foto_profile" class="form-control" type="file"  id="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded-circle avatar-xl" src="{{(!empty($EditData->foto_profile))? url('upload/foto_admin/'
                                    .$EditData->foto_profile):url('upload/no_image.jpg')}}" alt="Card image cap">

                                </div>
                            </div>
                           <input type="submit" class="btn btn-primary w-xs waves-effect waves-light" value="Simpan Data">

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </form>
</div>

{{-- /* Reading the image file and displaying it on the screen. */ --}}
<script type="text/javascript">

   $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>
@endsection
