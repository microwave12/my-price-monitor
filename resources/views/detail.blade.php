@extends('layouts.master')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Page {{ $page[0]['title'] }}
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="border-right: 1px solid #eee">
                                    <h3>{{ $page[0]['title'] }}</h3>
                                    <img src="{{ $page[0]['image'] }}" alt="{{ $page[0]['title'] }}">

                                    <h4>Description :</h4>
                                    <div style="margin-bottom: 20px">
                                        {!! $page[0]['description'] == '' ? '-' : $page[0]['description'] !!}
                                    </div>
                                    
                                    <h4>Current Price : </h4>
                                    {{ $page[0]['amount'] }} {{ $page[0]['currency'] }}
                                </div>

                                <div class="col-lg-6" style="padding-left: 30px">
                                    <h5>Price History :</h5>

                                    @foreach($page as $row)
                                        <div style="margin-bottom: 20px;">
                                            <img src="{{ $row['image'] }}" alt="{{ $row['title'] }}" width="100px" style="margin-right: 20px">
                                            <b>Price :</b> {{ $row['amount'] }} {{ $row['currency'] }} | 
                                            <b>Last Updated :</b> {{ $row['created_at'] }}
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <style>
                img {
                    border: 1px solid #eee;
                }
            </style>
@endsection