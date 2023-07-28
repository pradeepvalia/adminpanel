@extends('admin.dashboard')

@section('maincontent')
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
  <div class="card-header"><b>EDIT STORE </b>

  </div>
  <div class="card-body">

  <form action="{{ url('/admin/stores/update',[$stores->id]) }}" id="form" method="post" enctype="multipart/form-data">

      {!! csrf_field() !!}

        <label>Name</label><br>
        <input type="text" value="{{ $stores->name }}" name="name" id="name" class="form-control" >
        <span style="color: red">@error('name'){{$message}}@enderror</span><br>

        <label>Address</label><br>
        <textarea type="text"   name="address" id="address" class="form-control">{{ $stores->address }}</textarea>
        <span style="color: red">@error('address'){{$message}}@enderror</span><br>


        <label>Country</label><br>
      <select class="form-control select2" name="country">
              <option value="{{$stores->country}}">{{$stores->country}}</option>
      </select>
        <span style="color: red">@error('country'){{$message}}@enderror</span><br>

      <label>State</label><br>
      <select class="form-control select2" name="state">
          <option value="{{$stores->state}}">{{$stores->state}}</option>
      </select>
      <span style="color: red">@error('state'){{$message}}@enderror</span><br>

      <label>City</label><br>
      <select class="form-control select2" name="city">
          <option value="{{$stores->city}}">{{$stores->city}}</option>
          <option value="Vadodara">Vadodara</option>
          <option value="Rajkot">Rajkot</option>
          <option value="Ahmedabad">Ahmedabad</option>
      </select>
      <span style="color: red">@error('city'){{$message}}@enderror</span><br>


        <input type="submit" value="upadte" class="btn btn-success">
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
