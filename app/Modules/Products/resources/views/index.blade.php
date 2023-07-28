@extends('admin.dashboard')

@section('maincontent')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> </h3>
            <h3 class="card-title">PRODUCT</h3>

        </div>


        <div class="card-body">
            <div>

            </div>
            <!-- /.card-header -->
            <table id="myTable" class="display table table-bordered table-striped">
                <thead>
                    <tr>

                        <th> id </th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>UPC</th>
                        <th>Store</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($product as $col)
                        <tr>


                            <td>{{ $col->id }}</td>
                            <td id="title-{{ $col->id }}">{{ $col->name }}</td>
                            <td>{{ $col->price }}</td>
                            <td>{{ $col->stock }}</td>
                            <td>{{ $col->upc }}</td>
                            <td>{{ $col->store->name }}</td>
                            <td>
                                <div>

                                    <a href="{{ url('/admin/product/edit', [$col->id]) }}" class="edit"><i
                                            class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('/admin/product/destroy',[$col->id]) }}"class="delete" ><i class="fas fa-trash-alt"></i></a>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection

@push('custom-script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('.card-body #myTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": true,
            });

        });
    </script>
@endpush

</body>

</html>
