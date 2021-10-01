@extends('layouts.master')

@section('title')
    View Hotel
@endsection

@section('headername')
    Hotel
@endsection

@section('content')
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="col-md-12">
                    <a href="{{ url('/create_hotel',['id'=>0]) }}" class="btn btn-outline-primary" style="margin-bottom:1em">Create New Hotel</a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                            <th>Hotel Name</th>
                            <th>Rate Per Day</th>
                            <th>LastUpdated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)


                            <tr>
                                <td data-id="1"></td>
                                <td>{{ $item->hotel_name }}</td>
                                <td>{{ $item->rate_per_day }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ url('create_hotel',['id'=>$item->id]) }}" class="mdi mdi-circle-edit-outline mdi-18px"></a>
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
