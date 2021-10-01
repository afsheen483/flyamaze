@extends('layouts.master')

@section('title')
    Leads
@endsection

@section('headername')
    Leads
@endsection

@section('content')
    <!-- Begin page -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="col-md-12">
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Primary Contant</th>
                                <th>Secondary Contact</th>
                                <th>Remarks</th>
                                <th>Response Status</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->first_name }}{{ " " }}{{ $data->last_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone_num }}</td>
                                <td>{{ $data->phone_num_1 }}</td>
                                <td>{{ $data->remarks }}</td>
                                <td>{{ $data->updated_at }}</td>
                              
                                <td>
                                    <span class="badge badge-pill badge-success">{{ $data->response_status }}</span>
                                </td>
                                <td>{{ $data->updated_at }}</td>
                                <td>
                                    <div>
                                        <a href="{{ url('lead_generate',['id'=>$data->id]) }}"
                                            
                                            class="mdi mdi-plus mdi-18px"></a>&nbsp;
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- container-fluid -->

@endsection
