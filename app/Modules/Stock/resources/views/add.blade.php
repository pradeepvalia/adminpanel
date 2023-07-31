@extends('admin.dashboard')

@section('maincontent')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong></strong>Stock Added Successfully.
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
  <div class="card-header">ADD STOCK</div>
  <div class="card-body">

      <form action="{{ route('stock.save') }}" id="form" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

          <label>Store</label><br>
          <select class="form-select form-control" aria-label="select" name="store_id" id="store_id">
              <span style="color: red">@error('store_id'){{$message}}@enderror</span></br>
              <option value="">--Select Store--</option>
              @foreach ($store as $item )
                  <option value="{{$item ->id}}">{{$item ->name}}</option>
              @endforeach
          </select>
          </br>

        <label>Product</label><br>

          <select class="form-select form-control" aria-label="select" name="product_id" id="product_id">
              <span style="color: red">@error('product_id'){{$message}}@enderror</span></br>
              <option value="">--Select Store--</option>
              @foreach ($product as $item )
                  <option value="{{$item ->id}}">{{$item ->name}}</option>
              @endforeach
          </select>
          <br>

          <label>Stock</label><br>
          <input type="number" name="stock" id="stock" value="" class="form-control">
         <br>
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
