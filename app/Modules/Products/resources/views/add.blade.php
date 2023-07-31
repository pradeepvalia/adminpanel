@extends('admin.dashboard')

@section('maincontent')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong></strong>Product Added Successfully.
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
  <div class="card-header">ADD PRODUCT</div>
  <div class="card-body">

      <form action="{{ route('product.save') }}" id="form" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

          <label>Product Name</label><br>
          <input type="text" name="name" id="name" value="" class="form-control">
          <span style="color: red">@error('name'){{$message}}@enderror</span><br>

        <label>Price</label><br>
        <input type="number" name="price" value="" id="price" class="form-control">
        <span style="color: red">@error('price'){{$message}}@enderror</span><br>

          <label>UPC</label><br>
          <input type="number" name="upc" value="" id="upc" class="form-control">
          <span style="color: red">@error('upc'){{$message}}@enderror</span><br>



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

                price:{
                    required:true,
                },
                upc:{
                    required:true,
                    maxlength:12,

                },


            },
            messages:{
            name: {
                required: 'Enter The name !!',

            },
            price:{
                required: 'Enter The Price !!',

            },
            upc: {
                required: 'Enter The UPC !!',
                maxlength:'The UPC May Not Be Greater Than 12 Digit.',

            },


            },
        });
    });


</script>
@endpush
