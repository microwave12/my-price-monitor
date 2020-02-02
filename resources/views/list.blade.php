@extends('layouts.default')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">List of Product Page Links</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Description</th>
                                        <th>Latest Price</th>
                                        <th>Page Link</th>
                                    </tr>
                                </thead>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

		    <script>
		    $(document).ready(function() {
		        $('#dataTables-example').DataTable({
		            procesing: true,
		            responsive: true,
		            ajax: '{{ URL::to("/getdata") }}',
		            columns: [
			            { data: 'member_id', name: 'member_id' },
			            { data: 'full_name', name: 'full_name' },
			            { data: 'dob', name: 'dob' },
			            { data: 'email', name: 'email' },
			            { data: 'country.country', name: 'country' },
			            { data: 'mobile_number', name: 'mobile_number' },
                        { data: 'member_id', "mRender": function (member_id) {
                                return "<a href={{ URL::to('/edit') }}/"+member_id+">Edit</a> | <a onClick=\"return confirm('Are you sure want to delete ID "+member_id+"?')\" href={{ URL::to('/delete') }}/"+member_id+">Delete</a>";}
                        }
			        ],
                    "order": [[ 0, "desc" ]],
                    dom: 'Bfrtip',
                    buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }
                    ]
		        });
		    });
		    </script>
@endsection