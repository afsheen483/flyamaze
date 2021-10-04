@extends('layouts.master')

@section('title')
    Phone Book
@endsection

@section('headername')
    Phone Book
@endsection

{{-- @hasrole('caller')
<style>

    .calls{
        -ms-flex: 0 0 25% !important;
        flex: 0 0 25% !important;
        max-width: 16.1% !important;
    }
    
    </style>
@endhasrole --}}
@section('content')
@hasrole('caller')
<div class="row">
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Completed </h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Completed')->where('caller_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Not Answered</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','NotAnswerd')->where('caller_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Busy Calls</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Busy')->where('caller_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-exclamation-triangle  bg-danger text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Pending Calls</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Pending')->where('caller_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 88%" aria-valuenow="88"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">In-Process Calls<span class="float-right">88%</span></p> --}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-spinner bg-warning text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">In progress</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','InProcess')->where('caller_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-th-list bg-primary text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Total Assigned</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('caller_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p> --}}
            </div>
        </div>
    </div>
</div>

@endhasrole

@hasrole('Manager')
<div class="row">
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Completed </h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Completed')->where('manager_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Not Answered</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','NotAnswerd')->where('manager_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Busy Calls</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Busy')->where('manager_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-exclamation-triangle  bg-danger text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Pending Calls</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Pending')->where('manager_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 88%" aria-valuenow="88"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">In-Process Calls<span class="float-right">88%</span></p> --}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-spinner bg-warning text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">In progress</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','InProcess')->where('manager_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-th-list bg-primary text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Total Assigned</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('manager_id','=',Auth::user()->id)->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p> --}}
            </div>
        </div>
    </div>
</div>
@endhasrole
@hasrole('admin')
<div class="row">
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Completed </h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Completed')->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Not Answered</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','NotAnswerd')->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-phone bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Busy Calls</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Busy')->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-exclamation-triangle  bg-danger text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Pending Calls</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','Pending')->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 88%" aria-valuenow="88"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">In-Process Calls<span class="float-right">88%</span></p> --}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-spinner bg-warning text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">In progress</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('response_status','InProcess')->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 calls">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-th-list bg-primary text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Total Assigned</h5>
                </div>
                <h3 class="mt-4">{{ \App\Models\ContactModel::where('caller_id','!=','')->orWhere('manager_id','!=','')->where('is_deleted','=',0)->get()->count() }}</h3>
                <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p> --}}
            </div>
        </div>
    </div>
</div>
@endhasrole
{{-- Page Content --}}
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
               @hasrole('caller')
              
                <div class="col-md-2 col-lg-2 col-sm-2" style="margin-bottom:1em" >
                    <a href="{{ url('phonebook_form',['id'=>0]) }}" class="btn btn-outline-primary" >Create New Contact</a>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-9" >
                    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data" id="bulk_form" class="form-inline" style="margin-left:20%;">
                         @csrf
                         
                         <input type="file" name="file" required>
                                 {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                            
                         <button class="btn btn-info">Import data</button>&nbsp;&nbsp;
                         <a href="{{ asset('upload/sample.xlsx') }}" class="btn btn-success" target="_blank">Sample File</a>&nbsp;&nbsp;
                         <a href="{{ asset('upload/sample1.xlsx') }}" class="btn btn-success" target="_blank">Only Contact</a>
     
                         {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}
                     </form>
                 </div>
              
               @else
              
                <div class="col-md-2 col-lg-2 col-sm-2" style="margin-bottom:1em" >
                    <a href="{{ url('phonebook_form',['id'=>0]) }}" class="btn btn-primary" >Create New Contact</a>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-9" >
                    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data" id="bulk_form" class="form-inline" style="margin-left:20%;">
                         @csrf
                         
                         <input type="file" name="file" required>
                                 {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                            
                         <button class="btn btn-info">Import data</button>&nbsp;&nbsp;
                         <a href="{{ asset('upload/sample.xlsx') }}" class="btn btn-success" target="_blank">Sample File</a>&nbsp;&nbsp;
                         <a href="{{ asset('upload/sample1.xlsx') }}" class="btn btn-success" target="_blank">Only Contact</a>
     
                         {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}
                     </form>
                 </div>
              
                 <!-- Button trigger modal -->
                    @hasrole('admin')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 1.4%">
                        Assign Manager
                    </button>
                    
                    @endhasrole
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign Manager</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('assign_manager') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        @hasrole('admin')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="manager_id" id="" class="form-control">
                                                    <option value="">Assign Manager</option>
                                                    @foreach ($manager_array as $array)
                                                        <option value="{{ $array->id }}">{{ $array->first_name }}{{ " " }}{{ $array->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endhasrole
                                      
                                        <input type="text" name="item_id"  id="contact_ids" class="contact_ids" hidden> 

                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                            </div>
                        </div>
                        </div>
                    </div>
               @endhasrole
                <br>

              @hasanyrole('admin|Manager')
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" style="margin-left: 1.4%">
                Assign Caller
            </button>
            
              @endhasanyrole
                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Caller</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('assign_manager') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select name="caller_id" id="" class="form-control">
                                                <option value="">Assign Caller</option>
                                                @foreach ($caller_array as $array)
                                                    <option value="{{ $array->id }}">{{ $array->first_name }}{{ " " }}{{ $array->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="text" name="item_id"  id="contact_ids" class="contact_ids" hidden> 

                                </div>
                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                        </div>
                    </div>
                    </div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                           
                            <th><input type="checkbox" name="checkAll" id="selectAll" value=""></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Primary Contant</th>
                            <th>Address</th>
                            <th>Caller</th>
                            <th>Manager</th>
                            <th>Remarks</th>
                            <th>Response Status</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                @php
                                  $contact_ids = "";
                                  
                                @endphp
                       @foreach ($data as $data)
                       <tr>
                        @php
                        $contact_ids .=  $data->id .",";
                    @endphp 
                        <td><input type="checkbox" name="id[]" value="{{ $data->id }}" class="check_box" id="check-box" ></td>
                        <td>{{ $data->first_name }}{{ " " }}{{ $data->last_name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone_num }}</td>
                        <td>{{ $data->city }}</td>
                        <td>{{ $data->caller_name }}</td>
                        <td>{{ $data->manager_name }}</td>
                        <td>{{ $data->remarks }}</td>
                        <td>
                            <span class="badge badge-pill badge-success">{{ $data->response_status }}</span>
                        </td>
                        <td>{{ $data->entry_date }}</td>
                        <td>
                            <div>
                                <a href="{{ url('phonebook_form',['id'=>$data->id]) }}" class="mdi mdi-circle-edit-outline mdi-18px"
                                   ></a>&nbsp;
                                <a href="#" onclick="location.href='/PhoneBook/ChangeResponseStatus/{{ $data->id }}'"
                                    class="mdi mdi-chat-processing mdi-18px"></a>&nbsp;
                            </div>
                        </td>
                        </tr>
                       @endforeach
                       <input type="text" name="all_contact_ids" value="{{ $contact_ids }}" id="all_contact_ids" hidden>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- content -->
<div class="modal bd-example-modal-lg" id="assign" data-request-url="/PhoneBook/Assign/-1" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true"></div>
<div class="modal bd-example-modal-lg" id="multiAssignModal" data-request-url="/PhoneBook/MultiAssign" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"></div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var url = "{{ url('delete_null_caller_values') }}";
           $.ajax({
               url: url,
               type: "DELETE",
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               data: {
                   _token: '{{ csrf_token() }}',
               },
               success: function(response) {
                   console.log("success");
               },
               error: function(jqXHR, textStatus, errorThrown) {
                   console.log("update request failure");
                   //errorFunction(); 
               }
           });


        //    checkbox
        $("#selectAll").change(function() {
       
       if($(this).is(":checked")) {
          $(".check_box").prop('checked', true);
       }
       else {
           $(".check_box").prop('checked', false);
       }
   });

   $('#selectAll').click(function(e){
          
          var patient_ids = "";
       
            // patient_ids = patient_ids + 
            if($(this).prop("checked") == true){
                var all_contact_ids = $("#all_contact_ids").val();
                 $(".contact_ids").val(all_contact_ids);
                 console.log(all_contact_ids);

           }else{

                 $(".contact_ids").val('');

                   
               
           }

             // console.log(this.data());
         

         
       
          });

          $('.check_box').click(function(){

          if($(this).prop("checked") == true){
                var id = $(this).val();
               // console.log(id);.
                var ids = $(".contact_ids").val();
                ids = ids + id + ",";
                console.log(ids);
                $(".contact_ids").val(ids);
          }else{
             var id = $(this).val();
           // console.log(id);.
            var ids = $(".contact_ids").val();
            ids = ids.replace(id + "," , "");
            console.log(ids);
            $(".contact_ids").val(ids);
          }
        });
        });
    </script>
@endsection