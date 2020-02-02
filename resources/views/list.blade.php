@extends('layouts.master')

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
                            Product Page Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Page Title</th>
                                        <th>Page Link</th>
                                        <th>Description</th>
                                        <th style="width: 100px">Current Price</th>
                                        <th>Preview</th>
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
                        ajax: '{{ URL::to("/lists") }}',
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'title', name: 'title' },
                            { data: 'link', name: 'link' },
                            { data: 'description', "mRender": function (description) {
                                return description == '' ? '-' : description.replace(/(<([^>]+)>)/ig, "");
                            } },
                            { data: 'amount', "mRender": function (data, type, row) {
                                return row.amount + " " + row.currency;
                            } },
                            { data: 'id', "mRender": function (id) {
                                    return "<a href={{ URL::to('/page') }}/"+id+">Details</a>";}
                            }
                        ]
                    });
                });
		    </script>
@endsection