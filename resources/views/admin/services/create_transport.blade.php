@extends('layouts.master')

@section('title')
    Create Transport
@endsection

@section('headername')
    Create Transport
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="/Transport/Create" method="post"><input name="__RequestVerificationToken" type="hidden"
                            value="PG_ZVhyIaR-pZuV_RXHSuprUOeYu3ozoON82Pxhcjvj1SRL5A4A1odz7btj1QEPcPorVWVw508rZOvMtS2gSiRSgreb8J1t3VIsW4v2t2pCTEMzcCq-lhijfyQPQBjSOrbO6G9K26FgZhP_vTzNERA2" />
                            @csrf
                        <div class="validation-summary-valid" data-valmsg-summary="true">
                            <ul>
                                <li style="display:none"></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="Vehicle">Vehicle</label>
                                <input class="form-control text-box single-line" id="Vehicle" name="Vehicle"
                                    placeholder="Vehicle" required="required" type="text" value="{{ $data->vehicle }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="Vehicle"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="RatePerHour">Rate Per Hour</label>
                                <input class="form-control text-box single-line" id="RatePerHour" name="RatePerHour"
                                    placeholder="Rate Per Hour" required="required" type="text" value="{{ $data->rate_per_hour }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="RatePerHour"
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
                                <button type="button" onclick="location.href='/Transport'"
                                    class="btn btn-success waves-effect m-l-5">
                                    Back
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endsection
