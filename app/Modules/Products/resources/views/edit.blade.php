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
  <div class="card-header"><b>EDIT PRODUCT </b>

  </div>
  <div class="card-body">

  <form action="{{ url('/admin/product/update',[$product->id]) }}" id="form" method="post" enctype="multipart/form-data">

      {!! csrf_field() !!}


        <label>Product Name</label><br>
        <input type="text" value="{{ $product->name }}" name="name" id="name" class="form-control" >
        <span style="color: red">@error('name'){{$message}}@enderror</span><br>



        <label>Price</label><br>
        <textarea type="text"   name="price" id="price" class="form-control">{{ $product->price }}</textarea>
        <span style="color: red">@error('price'){{$message}}@enderror</span><br>


        <label>Stock</label><br>
        <input type="text"  value="{{ $product->stock }}" name="stock" id="stock" class="form-control">
        <span style="color: red">@error('stock'){{$message}}@enderror</span><br>

      <label>UPC</label><br>
      <input type="text"  value="{{ $product->upc }}" name="upc" id="upc" class="form-control">
      <span style="color: red">@error('upc'){{$message}}@enderror</span><br>

      <label>Store</label><br>
      <select class="form-control select2" name="store_id">
          @foreach($store as $stores)
                  <option value="{{$stores->id}}">{{$stores->name}}</option>
          @endforeach
      </select>
      <span style="color: red">@error('store_id'){{$message}}@enderror</span><br>

      <br>

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

                    price:{
                        required:true,
                    },
                    upc:{
                        required:true,
                        maxlength:12,

                    },
                    stock:{
                        required:true,
                    },
                    store_id:{
                        required:true,
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
                    stock: {
                        required: ' Enter The Stock !!',

                    },
                    store_id: {
                        required: ' Select The Store !!',

                    },

                },
            });
        });


    </script>
@endpush
