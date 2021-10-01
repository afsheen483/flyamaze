@extends('layouts.master')

@section('title')
    Create Lead
@endsection

@section('headername')
    Leads
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-7">
            <div class="card m-b-30">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#ticket" role="tab">
                                <span class="d-none d-md-block">Ticket</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-airplane h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#visa" role="tab">
                                <span class="d-none d-md-block">Visa</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-account-badge-horizontal h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#transport" role="tab">
                                <span class="d-none d-md-block">Transport</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-bus h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#hotel" role="tab">
                                <span class="d-none d-md-block">Hotel</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-bed-empty h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#siteScence" role="tab">
                                <span class="d-none d-md-block">Site Scene</span><span class="d-block d-md-none"><i
                                        class="mdi mdi-bed-empty h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="ticket" role="tabpanel">
                            <form action="{{ url('lead_generate_store') }}" method="post">
                                @csrf
                                <div class="validation-summary-valid" data-valmsg-summary="true">
                                    <ul>
                                        <li style="display:none"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label for="PassengerType">Passenger Type</label>
                                        <select class="form-control" data-val="true"
                                            data-val-required="The Passenger Type field is required." id="PassengerType"
                                            required="required" name="passenger_type">
                                            <option selected="selected" value="0">Select Passenger Type</option>
                                            <option value="adult">Adult</option>
                                            <option value="child">Child</option>
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="PassengerType"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="FirstName">First Name</label>
                                        <input class="form-control text-box single-line" id="FirstName" name="first_namse"
                                            placeholder="First Name" required="required" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="FirstName"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="LastName">Last Name</label>
                                        <input class="form-control text-box single-line" id="LastName" name="last_name"
                                            placeholder="Last Name" required="required" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="LastName"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Passport">Passport</label>
                                        <input class="form-control text-box single-line" id="Passport" name="passport"
                                            placeholder="Passport" required="required" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Passport"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="Airline">Airline</label>
                                        <input class="form-control text-box single-line" id="Airline" name="airline"
                                            placeholder="Airline" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Airline"
                                            data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Buisness">Buisness</label>
                                        <input class="form-control text-box single-line" id="Buisness" name="buisness"
                                            placeholder="Buisness" required="required" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Buisness"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="PNR">PNR</label>
                                        <input class="form-control text-box single-line" id="PNR" name="pnr"
                                            placeholder="PNR" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="PNR"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="BaseFare">Base Fare</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Base Fare must be a number."
                                            data-val-required="The Base Fare field is required." id="BaseFare"
                                            name="base_fare" placeholder="Base Fare" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="BaseFare"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="Tax">Tax</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Tax must be a number."
                                            data-val-required="The Tax field is required." id="Tax" name="tax"
                                            placeholder="Tax" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Tax"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label for="Margin">Margin</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Margin must be a number."
                                            data-val-required="The Margin field is required." id="Margin" name="margin"
                                            placeholder="Margin" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Margin"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="SalePrice">Sale Price</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Sale Price must be a number."
                                            data-val-required="The Sale Price field is required." id="sale_price"
                                            name="SalePrice" placeholder="Sale Price" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="SalePrice"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="Total">Total</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Total must be a number."
                                            data-val-required="The Total field is required." id="Total" name="total"
                                            placeholder="Total" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Total"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label for="ClientComment">Client Comment</label>
                                        <input class="form-control text-box single-line" id="ClientComment"
                                            name="client_comment" placeholder="Client Comment" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="ClientComment"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                               
                         
                        </div>
                        <div class="tab-pane p-3" id="visa" role="tabpanel">
                          <input data-val="true"
                                    data-val-number="The field LeadId must be a number."
                                    data-val-required="The LeadId field is required." id="LeadId" name="lead_id"
                                    type="hidden" value="{{ request()->id }}" />
                                <div class="validation-summary-valid" data-valmsg-summary="true">
                                    <ul>
                                        <li style="display:none"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Visa">Visa</label>
                                        <select class="form-control" id="Visa" name="visa_id" required="required">
                                            <option value="">Select Visa</option>
                                                @foreach ($visa_array as $array)
                                                    <option value="{{ $array->id }}">{{ $array->country }}{{ " " }}{{ $array->category }}</option>
                                                @endforeach
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Visa"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="VisaAmount">Amount</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Amount must be a number."
                                            data-val-required="The Amount field is required." id="VisaAmount"
                                            name="visa_amount" placeholder="Amount" readonly="readonly" type="text"
                                            value="0" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="VisaAmount"
                                            data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="VisaPSF">Profit %</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Profit % must be a number."
                                            data-val-required="The Profit % field is required." id="VisaPSF" name="visa_psf"
                                            placeholder="Profit %" required="required" type="text" value="0" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="VisaPSF"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="VisaSalePrice">Sale Price</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Sale Price must be a number."
                                            data-val-required="The Sale Price field is required." id="VisaSalePrice"
                                            name="visa_sale_price" placeholder="Profit %" readonly="readonly" type="text"
                                            value="0" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="VisaSalePrice"
                                            data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Comments">Comments</label>
                                        <input class="form-control text-box single-line" id="Comments" name="visa_comments"
                                            placeholder="Comments" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Comments"
                                            data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                               
                            
                        </div>
                        <div class="tab-pane p-3" id="transport" role="tabpanel">
                            <input data-val="true"
                                    data-val-number="The field LeadId must be a number."
                                    data-val-required="The LeadId field is required." id="LeadId" name="LeadId"
                                    type="hidden" value="2" />
                                <div class="validation-summary-valid" data-valmsg-summary="true">
                                    <ul>
                                        <li style="display:none"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Transport">Transport</label>
                                        <select class="form-control" id="Transport" name="transport_id" required="required">
                                            <option value="">Select Transport</option>
                                            @foreach ($transport_array as $array)
                                                <option value="{{ $array->id }}">{{ $array->vehicle }}</option>
                                            @endforeach
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Transport"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="TransportRatePerHour">Rate Per Hour</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Rate Per Hour must be a number."
                                            data-val-required="The Rate Per Hour field is required."
                                            id="TransportRatePerHour" name="transport_rate_per_hour" placeholder="Amount"
                                            readonly="readonly" type="text" value="0" />
                                        <span class="field-validation-valid text-danger"
                                            data-valmsg-for="TransportRatePerHour" data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="TransportPSF">Profit %</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Profit % must be a number."
                                            data-val-required="The Profit % field is required." id="TransportPSF" min="0"
                                            name="transport_psf" placeholder="Profit %" required="required" type="text"
                                            value="0" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="TransportPSF"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="TransportDays">Days</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Days must be a number."
                                            data-val-required="The Days field is required." id="TransportDays" min="0"
                                            name="transport_days" placeholder="Days" required="required" type="number"
                                            value="0" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="TransportDays"
                                            data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="TransportSalePrice">Sale Price</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Sale Price must be a number."
                                            data-val-required="The Sale Price field is required." id="TransportSalePrice"
                                            min="0" name="transport_sale_price" placeholder="Sale Price" readonly="readonly"
                                            required="required" type="text" value="0" />
                                        <span class="field-validation-valid text-danger"
                                            data-valmsg-for="TransportSalePrice" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                             
                        </div>
                        <div class="tab-pane p-3" id="hotel" role="tabpanel">
                          
                                <div class="validation-summary-valid" data-valmsg-summary="true">
                                    <ul>
                                        <li style="display:none"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="HotelName">Hotel</label>
                                        <input class="form-control text-box single-line" id="HotelName" name="hotel_name"
                                            placeholder="Name" required="required" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="HotelName"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="HotelDays">Days</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Days must be a number."
                                            data-val-required="The Days field is required." id="HotelDays" name="hotel_days"
                                            placeholder="Days" required="required" type="number" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="HotelDays"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="HotelRate">Rate</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Rate must be a number."
                                            data-val-required="The Rate field is required." id="HotelRate" name="hotel_rate"
                                            placeholder="Rate" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="HotelRate"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="HotelAmount">Amount</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Amount must be a number."
                                            data-val-required="The Amount field is required." id="HotelAmount"
                                            name="hotel_amount" placeholder="Total" required="required" type="text"
                                            value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="HotelAmount"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Package">Package</label>
                                        <input class="form-control text-box single-line" id="Package" name="package"
                                            placeholder="Package" type="text" value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Package"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                             
                        </div>
                        <div class="tab-pane p-3" id="siteScence" role="tabpanel">
                           <input data-val="true"
                                    data-val-number="The field LeadId must be a number."
                                    data-val-required="The LeadId field is required." id="LeadId" name="LeadId"
                                    type="hidden" value="2" />
                                <div class="validation-summary-valid" data-valmsg-summary="true">
                                    <ul>
                                        <li style="display:none"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="Description">Description</label>
                                        <input class="form-control text-box single-line" id="Description"
                                            name="site_description" placeholder="Description" required="required" type="text"
                                            value="" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Description"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="Amount">Amount</label>
                                        <input class="form-control text-box single-line" data-val="true"
                                            data-val-number="The field Amount must be a number."
                                            data-val-required="The Amount field is required." id="Amount" name="sit_amount"
                                            placeholder="Amount" required="required" type="text" value="0" />
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Amount"
                                            data-valmsg-replace="true"></span>
                                    </div>

                                </div>
                              
                          
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                Save
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card m-b-30">
                <div class="card-body">
                    <style>
                        .label {
                            font-weight: bold;
                        }

                        .value {
                            padding-bottom: 1em;
                        }

                    </style>
                    <div>
                        <h4 class="mt-0 header-title">Lead Info</h4>
                        <hr />
                        <div class="dl-horizontal">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="label">
                                        Lead Id
                                    </div>

                                    <div class="value">
                                        2
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="label">
                                        Name
                                    </div>

                                    <div class="value">
                                        Ahmad Ali
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="label">
                                        Primary Contant
                                    </div>

                                    <div class="value">
                                        0326598777
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="label">
                                        Secondary Contact
                                    </div>

                                    <div class="value">
                                        03001324657
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="label">
                                        Last Updated
                                    </div>

                                    <div class="value">
                                        9/6/2021 6:46:12 PM
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="label">
                                        Response Status
                                    </div>

                                    <div class="value">
                                        Completed
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="label">
                                        Remarks
                                    </div>

                                    <div class="value">
                                        It will be done as soon as possible
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Lead Log</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Remarks</th>
                                    <th>Response Status</th>
                                    <th>LastUpdated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Test Rmarks</td>
                                    <td>NotAnswerd</td>
                                    <td>9/7/2021 12:37:03 PM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Call Answered but not interested</td>
                                    <td>Completed</td>
                                    <td>9/7/2021 1:38:39 PM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Call Answered but not interested</td>
                                    <td>InProcess</td>
                                    <td>9/10/2021 8:58:50 AM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Call Answered but not interested</td>
                                    <td>Completed</td>
                                    <td>9/10/2021 9:02:29 AM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Call after 10min-</td>
                                    <td>Busy</td>
                                    <td>9/16/2021 8:43:37 PM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Interested -Visa Required Ticket Required </td>
                                    <td>InProcess</td>
                                    <td>9/16/2021 8:44:30 PM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Interested -Visa Required Ticket Required -Visa Required Transport Required Ticket
                                        Required Side Scene Required Hotel Required </td>
                                    <td>InProcess</td>
                                    <td>9/16/2021 9:01:02 PM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Remarks-Visa Required Transport Required </td>
                                    <td>Completed</td>
                                    <td>9/22/2021 12:13:49 PM</td>
                                </tr>
                                <tr>
                                    <td>Mr Abbas</td>
                                    <td>Remarks-Visa Required Transport Required -Visa Required Transport Required </td>
                                    <td>Completed</td>
                                    <td>9/22/2021 12:22:24 PM</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
