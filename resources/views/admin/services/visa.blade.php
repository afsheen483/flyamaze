@extends('layouts.master')

@section('title')
    Visa
@endsection

@section('headername')
    Visa
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="col-md-12">
                    <a href="{{ url('/create_visa' , ['id' => 0]) }}" class="btn btn-outline-primary" style="margin-bottom:1em">Create New Visa</a>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap no-check" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                            <th>Country</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                              @foreach ($data as $item)
                              <tr>
                                <td data-id="2"></td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ url('create_visa',['id'=>$item->id]) }}" class="mdi mdi-circle-edit-outline mdi-18px" onclick="location.href='/Visa/Edit/2'"></a>
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