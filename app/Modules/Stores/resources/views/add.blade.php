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

          <div id="map"></div>

          <label>latitude</label><br>
          <input type="text" name="latitude" id="latitude" value="" class="form-control">
         <br>

          <label>longitude</label><br>
          <input type="text" name="longitude" id="longitude" value="" class="form-control">
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4NT9t8dRpdkED_554TgmedZGrsKteSS4&callback=initMap"
        type="text/javascript"></script>
<script>


        let map;
        function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 19.385218425469912, lng: 72.84696741498203 },
            zoom: 8,
            scrollwheel: true,
        });

        const uluru = { lat: 19.385218425469912, lng: 72.84696741498203 };
        let marker = new google.maps.Marker({
        position: uluru,
        map: map,
        draggable: true
    });

        google.maps.event.addListener(marker,'position_changed',
        function (){
        let lat = marker.position.lat()
        let lng = marker.position.lng()
        $('#latitude').val(lat)
        $('#longitude').val(lng)
    })

        google.maps.event.addListener(map,'click',
        function (event){
        pos = event.latLng
        marker.setPosition(pos)
    })
    }

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
                coordinates:{
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
                coordinates:{
                    required:' Select the Location !!',
                },
            },
        });
    });


</script>
@endpush
