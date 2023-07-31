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

  <form action="{{ url('/admin/stores/update',[$stores->id]) }}" id="form" method="post" enctype="multipart/form-data">

      {!! csrf_field() !!}

        <label>Name</label><br>
        <input type="text" value="{{ $stores->name }}" name="name" id="name" class="form-control" >
        <span style="color: red">@error('name'){{$message}}@enderror</span><br>

        <label>Address</label><br>
        <textarea type="text"   name="address" id="address" class="form-control">{{ $stores->address }}</textarea>
        <span style="color: red">@error('address'){{$message}}@enderror</span><br>


      <div id="map"></div>

      <label>latitude</label><br>
      <input type="text" name="latitude" id="latitude" value="{{ $stores->latitude }}" class="form-control">
      <br>

      <label>longitude</label><br>
      <input type="text" name="longitude" id="longitude" value="{{ $stores->longitude }}" class="form-control">
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4NT9t8dRpdkED_554TgmedZGrsKteSS4&callback=initMap"
            type="text/javascript"></script>
    <script>


        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat:{{ $stores->latitude }}, lng: {{ $stores->longitude }} },
                zoom: 8,
                scrollwheel: true,
            });

            const uluru = { lat: {{ $stores->latitude }}, lng:{{ $stores->longitude }} };
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
