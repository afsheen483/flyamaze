@extends('layouts.master')

@section('title')
Change Response Status
@endsection

@section('headername')
Phone Book
@endsection

@section('content')
<style>
    .label {
        font-weight: bold;
    }

    .value {
        padding-bottom: 1em;
    }
</style>
<div class="row">
    <div class="col-md-7 col-lg-7 col-sm-7">

        {{-- Caller Log --}}

        <div class="card m-b-30">
            <div class="card-body">

                <form action="{{ url('response_status',['id'=>request()->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <label>First Name</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="" name="first_name" 
                                        value="{{ is_null($data->first_name) ? '' : $data->first_name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Last Name</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="" name="last_name" 
                                        value="{{ is_null($data->last_name) ? '' : $data->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Primary Contact</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="" name="phone_num" 
                                        value="{{ is_null($data->phone_num) ? '' : $data->phone_num }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Email</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="" 
                                        value="{{ is_null($data->email) ? '' : $data->email }}" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Address</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="" name="address" 
                                        value="{{ is_null($data->address) ? '' : $data->address }}">
                                </div>
                            </div>
                         
            </div>
            {{-- <div class="row">
                <div class="col-6">
                    <label>Last Update</label>
                    <div class="form-group">
                        <input class="form-control" type="date" placeholder="" name="updated_at" required
                            value="{{ is_null($data->updated_at) ? '--/--/--' : date('Y-m-d',strtotime($data->updated_at)) }}">
                    </div>
                </div>
            </div> --}}


        </div>



    </div>
</div>
{{-- End coller log --}}

{{-- reponce status --}}
<div class="card m-b-30">
    <div class="card-body">
        <form action="/phonebook_create" method="POST">
            @csrf
            <input data-val="true" data-val-number="The field ContactId must be a number." id="ContactId"
                name="ContactId" type="hidden" value="1" />
            <div class="validation-summary-valid" data-valmsg-summary="true">
                <ul>
                    <li style="display:none"></li>
                </ul>
            </div>
            <div class="form-group row">
                <div class="col-xl-10 col-md-8">
                    <label for="ResponseStatus">Response Status</label>
                </div>
                <div class="checkbox checkbox-primary col-xl-10 col-md-8">
                    <select class="form-control" data-val="true"
                        data-val-required="The Response Status field is required." id="ResponseStatus"
                        name="response_status" required="required">
                        <option value="">Select Response Status</option>
                        <option value="1">NoAction</option>
                        <option value="2">Busy</option>
                        <option value="3">NotAnswerd</option>
                        <option value="4">InProcess</option>
                        <option value="5">Pending</option>
                        <option value="6">Completed</option>
                    </select>
                </div>
            </div>
            <label>Services</label>
            <div class="form-group row">
                <div class="checkbox checkbox-primary col-xl-2 col-md-2">
                    <label for="chkboxes" class="check">Visa</label>
                    <br />
                    <input id="Visa" name="visa" type="checkbox" value="visa" data-toggle="collapse"
                        href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"
                        class="check_box" />
                    <input name="chkboxes" type="hidden" value="false" />
                </div>

                <div class="checkbox checkbox-primary col-xl-2 col-md-2">
                    <label for="chkboxes" class="check">Transport</label>
                    <br />
                    <input data-val="true" id="Transport" name="transport" type="checkbox" value="transport"
                        class="check_box" /><input type="hidden" value="transport" />
                </div>
                <div class="checkbox checkbox-primary col-xl-2 col-md-2">
                    <label for="chkboxes" class="check">Ticket</label>
                    <br />
                    <input id="Ticket" name="ticket" type="checkbox" value="ticket" data-toggle="collapse"
                        href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"
                        class="check_box" /><input name="chkboxes" type="hidden" value="false" />
                </div>
                <div class="checkbox checkbox-primary col-xl-2 col-md-2">
                    <label for="chkboxes" class="check">Hotel</label>
                    <br />
                    <input data-val="true" id="Hotel" name="chkboxes" type="checkbox" value="hotel"
                        class="check_box" /><input name="Hotel" type="hidden" value="false" />
                </div>
                <div class="checkbox checkbox-primary col-xl-2 col-md-2">
                    <label for="chkboxes" class="check">Site Scene</label>
                    <br />
                    <input data-val="true" id="SiteScene" name="sitescene" type="checkbox" value="sitescene"
                        class="check_box" /><input type="hidden" value="false" />
                </div>
                {{-- collapse --}}
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-5">
                                <label>Country</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter country" name="country">
                                </div>
                            </div>
                            <div class="col-5">
                                <label>Category</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter category"
                                        name="category">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <div class="row">
                            
                            <div class="col-5">
                                <label>Departure Date</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="departure_date">
                                </div>
                            </div>
                            <div class="col-5">
                                <label>Arrival Date</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="arrival_date">
                                </div>
                            </div>
                            <div class="col-5">
                                <label>Sector</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="state">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- collapse end --}}
            <div class="form-group row">
                <div class="col-xl-12 col-md-12">
                    <label for="Remarks">Remarks</label>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <textarea cols="45" data-val="true"
                        data-val-maxlength="The field Remarks must be a string or array type with a maximum length of &#39;100&#39;."
                        data-val-maxlength-max="100"
                        htmlAttributes="{ class = form-control, placeholder = Remarks, rows = 3, style = width:inherit; }"
                        id="Remarks" name="dep_remarks" rows="5"> </textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            <a href="{{ url('/phone_book') }}" class="btn btn-secondary"
                data-dismiss="modal">Back</a>
        </form>
    </div>
</div>
{{-- end responce status --}}

</div>
{{-- coller log details --}}
<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Caller Log</h4>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Remarks</th>
                            <th>Response Status</th>
                            <th>Visa Info</th>
                            <th>Ticket Info</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($caller_data as $caller)
                        <tr>
                            <td>{{ $caller->caller_name }}</td>
                            <td>{{ $caller->remarks }}</td>
                            <td>{{ $caller->response_status }}</td>
                            <td>{{ $caller->visa_info }}</td>
                            <td>{{ $caller->ticket_info }}</td>
                            <td>{{ $caller->updated_at }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- coller log details end --}}
<!-- container-fluid -->
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(".check_box").click(function(){

            var val = $(this).val();
            if($(this).prop("checked") == true)
            {
                
                var rem = $(this).val();
                var exist = $("#Remarks").text();
                exist = exist + rem + "\n";
                

               $("#Remarks").text(exist);
            }
          
        });
    });
        
</script>

@endsection