@extends('layouts.master')

@section('title')
    Create Hotel
@endsection

@section('headername')
    Create Hotel
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="/Hotel/Create" method="post"><input name="__RequestVerificationToken" type="hidden"
                            value="qh9mj-tP5SrNNHH3Jnivd9Ik_GlKo1ju7yfcJIX8TxeK36U2z4JsL7gr0McVPKgqzdFDiM-bhBaw1oGVtBR4Yid_L5okr5ld0sdewPpFcZCp7W0N832YRRe53d6Ui-Gi67Q5NfXCX-O1imNlzN-rdw2" />
                            @csrf
                            <div class="validation-summary-valid" data-valmsg-summary="true">
                            <ul>
                                <li style="display:none"></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="HotelName">Hotel Name</label>
                                <input class="form-control text-box single-line" id="HotelName" name="HotelName"
                                    placeholder="Hotel Name" required="required" type="text" value="{{ $data->hotel_name }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="HotelName"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="RatePerDay">Rate Per Day</label>
                                <input class="form-control text-box single-line" id="RatePerDay" name="RatePerDay"
                                    placeholder="Rate Per Day" required="required" type="text" value="{{ $data->rate_per_day }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="RatePerDay"
                                    data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Reset
                                </button>
                                <button type="button" onclick="location.href='/Hotel'"
                                    class="btn btn-success waves-effect m-l-5">
                                    Back
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endsection
