@extends('admin.dashboard')

@section('maincontent')
    <style>
        #map {
            height: 400px;
        }
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

  <form action="{{ url('/admin/stock/update',[$stock->id]) }}" id="form" method="post" enctype="multipart/form-data">

      {!! csrf_field() !!}

      <label>Store</label><br>
      <select class="form-control select2" name="store_id">
          @foreach($store as $stores)
              <option value="{{$stores->id}}">{{$stores->name}}</option>
          @endforeach
      </select>
      <span style="color: red">@error('store_id'){{$message}}@enderror</span><br>

      <label>Store</label><br>
      <select class="form-control select2" name="product_id">
          @foreach($product as $products)
              <option value="{{$products->id}}">{{$products->name}}</option>
          @endforeach
      </select>
      <span style="color: red">@error('product_id'){{$message}}@enderror</span><br>

      <label>Stock</label><br>
      <input type="text"  value="{{ $stock->stock }}" name="stock" id="stock" class="form-control">
      <span style="color: red">@error('stock'){{$message}}@enderror</span><br>
      <br>
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
                    store_id:{
                        required:true,
                    },
                    product_id:{
                        required:true,
                    },
                    stock:{
                        required:true,
                    },

                },
                messages:{
                    store_id: {
                        required: 'Select The Store  !!',

                    },
                    product_id:{
                        required: 'Select The Product !!',

                    },
                    stock:{
                        required:' Enter the Stock !!',
                    },
                },
            });
        });


    </script>
@endpush
