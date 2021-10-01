@extends('layouts.master')

@section('title')
    Create Visa
@endsection

@section('headername')
    Create Visa
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="/Visa/Create" method="post">
                        @csrf
                        <input name="__RequestVerificationToken" type="hidden"
                            value="hH4H6rhRYmjIEeI29uFbHqpqvhdriGFL2tzSAS-1hEkak9voJ6HiyiAAPKOWbzDEtb1C2XHfVa5oV9_0EOOLvAfxCv30kIZezqMJYTsigpbaOPFDOHJRilzE_K_04AFN42xfh7CGTQIEB3dQMGYSxg2" />
                        <div class="validation-summary-valid" data-valmsg-summary="true">
                            <ul>
                                <li style="display:none"></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="Country">Country</label>
                                <input class="form-control text-box single-line" id="Country" name="Country"
                                    placeholder="Country Name" required="required" type="text" value="{{ $data->country }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="Country"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="Category">Category</label>
                                <input class="form-control text-box single-line" id="Category" name="Category"
                                    placeholder="Category Name" required="required" type="text" value="{{ $data->category }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="Category"
                                    data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="Amount">Amount</label>
                                <input class="form-control text-box single-line" data-val="true"
                                    data-val-number="The field Amount must be a number."
                                    data-val-required="The Amount field is required." id="Amount" name="Amount"
                                    placeholder="Amount" required="required" type="text" value="{{ $data->amount }}" />
                                <span class="field-validation-valid text-danger" data-valmsg-for="Amount"
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
                                <button type="button" onclick="location.href='/Visa'"
                                    class="btn btn-success waves-effect m-l-5">
                                    Back
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endsection
