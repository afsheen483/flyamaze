@extends('layouts.master')

@section('title', 'Add User')

@section('content')

    <div class='col-lg-12 col-lg-offset-4'>

        <h1><i class='fa fa-user-plus'></i> Add User</h1>
        <hr>

        {{ Form::open(['url' => 'users']) }}

        <div class="row">
            <div class="col-lg-6 form-group">
                <label for="first_name">First Name</label>
                <input class="form-control text-box single-line" data-val="true"
                    data-val-maxlength="The field First Name must be a string or array type with a maximum length of &#39;30&#39;."
                    data-val-maxlength-max="30" data-val-required="The First Name field is required." id="FirstName"
                    name="first_name" placeholder="First Name" required="required" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="FirstName"
                    data-valmsg-replace="true"></span>
            </div>
            <div class="col-lg-6 form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control text-box single-line" data-val="true"
                    data-val-maxlength="The field Last Name must be a string or array type with a maximum length of &#39;30&#39;."
                    data-val-maxlength-max="30" data-val-required="The Last Name field is required." id="LastName"
                    name="last_name" placeholder="Last Name" required="required" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="LastName"
                    data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 form-group">
                <label for="phone_no">PhoneNumber</label>
                <input class="form-control text-box single-line" data-val="true"
                    data-val-maxlength="The field PhoneNumber must be a string or array type with a maximum length of &#39;20&#39;."
                    data-val-maxlength-max="20" data-val-required="The PhoneNumber field is required." id="PhoneNumber"
                    name="phone_no" placeholder="Phone Number" required="required" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNumber"
                    data-valmsg-replace="true"></span>
            </div>
            <div class="col-lg-6 form-group">
                <label for="email">Email</label>
                <input class="form-control text-box single-line" data-val="true"
                    data-val-email="The Email field is not a valid e-mail address."
                    data-val-required="The Email field is required." id="Email" name="email" placeholder="Email"
                    required="required" type="email" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 form-group">
                <label for="password">Password</label>
                <input class="form-control text-box single-line password" data-val="true"
                    data-val-length="The Password must be at least 6 characters long." data-val-length-max="100"
                    data-val-length-min="6" data-val-required="The Password field is required." id="Password"
                    name="password" placeholder="Password" required="required" type="password" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Password"
                    data-valmsg-replace="true"></span>
            </div>
            <div class="col-lg-6 form-group">
                <label for="confirm_password">Confirm password</label>
                <input class="form-control text-box single-line password" data-val="true"
                    data-val-equalto="The password and confirmation password do not match."
                    data-val-equalto-other="*.Password" id="ConfirmPassword" name="ConfirmPassword"
                    placeholder="confirm_password" required="required" type="password" />
                <span class="field-validation-valid text-danger" data-valmsg-for="ConfirmPassword"
                    data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 form-group">
                <label for="address">Address</label>
                <input class="form-control text-box single-line" data-val="true"
                    data-val-maxlength="The field Address must be a string or array type with a maximum length of &#39;30&#39;."
                    data-val-maxlength-max="30" id="Address" name="address" placeholder="Address" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Address"
                    data-valmsg-replace="true"></span>
            </div>
            <div class="col-lg-6 form-group">
                <label for="role_id">Role</label>
                <select class="form-control" id="RoleId" name="roles" required="required">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach


                </select>
                <span class="field-validation-valid text-danger" data-valmsg-for="RoleId" data-valmsg-replace="true"></span>
            </div>
        </div>

        {{-- <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]', $role->id) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div> --}}


        {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>

@endsection
