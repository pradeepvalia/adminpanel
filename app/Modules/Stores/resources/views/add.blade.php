@extends('admin.dashboard')

@section('maincontent')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong></strong>Store Added Successfully.
        </div>
    @endif
    <style>
        .error {
            color: #dc3545;
            font-weight: 700;
            display:block;
            padding: 6px 0;
            font-size: 14px;
        }
    </style>

<div class="card">
  <div class="card-header">ADD STORE</div>
  <div class="card-body">

      <form action="{{ route('stores.save') }}" id="form" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

          <label>name</label><br>
          <input type="text" name="name" id="name" value="" class="form-control">
          <span style="color: red">@error('name'){{$message}}@enderror</span><br>

        <label>Address</label><br>

        <input type="text" name="address" value="" id="address" class="form-control">
        <span style="color: red">@error('address'){{$message}}@enderror</span><br>

        <label>Country</label><br>
          <select class="form-select form-control" aria-label="select" name="country" id="country">
              <option value="">--Select Country--</option>
                  <option value="India">India</option>
          </select>
        <span style="color: red">@error('country'){{$message}}@enderror</span><br>

          <label>State</label><br>
          <select class="form-select form-control" aria-label="select" name="state" id="state">
              <option value="">--Select State--</option>
                  <option value="Gujarat">Gujarat</option>

          </select>
          <span style="color: red">@error('state'){{$message}}@enderror</span><br>

          <label>City</label><br>
          <select class="form-select form-control" aria-label="select" name="city" id="city">
              <option value="">--Select State--</option>
              <option value="Vadodara">Vadodara</option>
              <option value="Rajkot">Rajkot</option>
              <option value="Ahmedabad">Ahmedabad</option>
          </select>
          <span style="color: red">@error('city'){{$message}}@enderror</span><br>

         <br>


        <input type="submit" value="Save" class="btn btn-success">

    </form>

  </div>
</div>
@endsection
@push('custom-script')
<script src="{{asset('resources/assets/common/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js')}}" ></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js')}}" ></script>
<script>

        $(document).ready(function(){
        $("#form").validate({
            ignore: [],
            rules:{
                name:{
                    required:true,
                    maxlength:200,
                },
                address:{
                    required:true,
                },
                country:{
                    required:true,
                },
                state:{
                    required:true,
                },
                city:{
                    required:true,
                },
                pincode:{
                    required:true,
                },
            },
            messages:{
            name: {
                required: 'Enter The name !!',

            },
                address:{
                required: 'Enter The address !!',

            },
                country:{
                    required:' Select the Country !!',
                },
                state:{
                    required:' Select the State !!',
                },
                city:{
                    required:' Select the City !!',
                },


            },
        });
    });


</script>
@endpush
