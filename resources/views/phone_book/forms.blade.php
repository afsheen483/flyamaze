@extends('layouts.master')

@section('title')
    Phone Book        
@endsection

@section('headername')
    Phone Book
@endsection

@section('content')
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                       
                    </div>
                    <br>
                   
                </div>
                <hr>
                @if (request()->id > 0)
                <form action="{{ url('phonebook_update',['id'=>$data->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                @else
                <form action="{{ url('phonebook_create') }}" method="post">
                    @csrf
                @endif
                    <div class="validation-summary-valid" data-valmsg-summary="true">
                        <ul>
                            <li style="display:none"></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="FirstName">First Name</label>
                            <input class="form-control text-box single-line" data-val="true"
                                data-val-maxlength="The field First Name must be a string or array type with a maximum length of &#39;30&#39;."
                                data-val-maxlength-max="30" data-val-required="The First Name field is required."
                                id="FirstName" name="first_name" placeholder="First Name"  type="text"
                                value="{{ is_null($data->first_name) ? '' : $data->first_name }}" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="FirstName"
                                data-valmsg-replace="true"></span>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="LastName">Last Name</label>
                            <input class="form-control text-box single-line" data-val="true"
                                data-val-maxlength="The field Last Name must be a string or array type with a maximum length of &#39;30&#39;."
                                data-val-maxlength-max="30" data-val-required="The Last Name field is required."
                                id="LastName" name="last_name" placeholder="Last Name"  type="text"
                                value="{{ is_null($data->last_name) ? '' : $data->last_name }}" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="LastName"
                                data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="PhoneNumber">Phone No</label>
                            <input class="form-control text-box single-line" data-val="true"
                                data-val-required="The Primary Contant field is required." id="PhoneNumber"
                                name="phone_num" placeholder="Phone Number"  type="text"
                                value="{{ is_null($data->phone_num) ? '' : $data->phone_num }}" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNumber"
                                data-valmsg-replace="true"></span>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="Email">Email</label>
                            <input class="form-control text-box single-line" data-val="true"
                                data-val-email="The Email field is not a valid e-mail address."
                                data-val-required="The Email field is required." id="Email" name="email" placeholder="Email"
                                 type="email" value="{{ is_null($data->email) ? '' : $data->email }}" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="Email"
                                data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="Address">Address</label>
                            <input class="form-control text-box single-line" data-val="true"
                                data-val-maxlength="The field Address must be a string or array type with a maximum length of &#39;50&#39;."
                                data-val-maxlength-max="50" id="Address" name="address" placeholder="Address" type="text"
                                value="{{ is_null($data->address) ? '' : $data->address }}" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="Address"
                                data-valmsg-replace="true"></span>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="Address">City</label>
                            <input class="form-control text-box single-line" data-val="true"
                                data-val-maxlength="The field Address must be a string or array type with a maximum length of &#39;50&#39;."
                                data-val-maxlength-max="50" id="city" name="city" placeholder="Address" type="text"
                                value="{{ is_null($data->city) ? '' : $data->city }}" />
                            <span class="field-validation-valid text-danger" data-valmsg-for="Address"
                                data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-6 form-group">
                            <label>Caller Name</label>
                                <select name="caller_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($caller_array as $array)
                                        @if ($data->caller_id == $array->id)
                                        <option value="{{ $array->id }}" selected>{{ $array->first_name }}{{ " " }}{{ $array->last_name }}</option>

                                        @else
                                        <option value="{{ $array->id }}">{{ $array->first_name }}{{ " " }}{{ $array->last_name }}</option>

                                        @endif
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label>Manager Name</label>
                            <select name="manager_id" id="" class="form-control">
                                <option value="">Select</option>
                                @foreach ($manager_array as $array)
                                    @if ($data->manager_id == $array->id)
                                    <option value="{{ $array->id }}" selected>{{ $array->first_name }}{{ " " }}{{ $array->last_name }}</option>

                                    @else
                                    <option value="{{ $array->id }}">{{ $array->first_name }}{{ " " }}{{ $array->last_name }}</option>

                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Reset
                            </button>
                            <a href="{{ url()->previous() }}" 
                                class="btn btn-success waves-effect m-l-5">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
    </div>
    </div>
@endsection
