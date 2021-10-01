@extends('layouts.master')

@section('title')
    View Transport
@endsection

@section('headername')
    View Transport
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="col-md-12">
                    <a href="{{ url('/create_transport',['id'=>0]) }}" class="btn btn-outline-primary" style="margin-bottom:1em" >Create New Transport</a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                            <th>Vehicle</th>
                            <th>Rate Per Hour</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                                
                            
                                <tr>
                                    <td data-id="1"></td>
                                    <td>{{ $item->vehicle }}</td>
                                    <td>{{ $item->rate_per_hour }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/create_transport',['id'=>$item->id]) }}" class="mdi mdi-circle-edit-outline mdi-18px" onclick="location.href='/Transport/Edit/1'"></a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection