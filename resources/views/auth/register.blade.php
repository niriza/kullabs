@extends('_layout/layout')

@section('title')
<title>Readplay|Users-Create</title>
@stop

@section('content')

<script type='text/javascript'>
</script>
<div class="row-fluid">
</div>
<?php 
	$roles = array('Super Admin','Data Entry', 'School Admin', 'Sponsor', 'Marketing Team', 'View Auth Only');
?>
{{ Form::open(array('route' => 'postRegister', 'files' => true,  'class' => 'form-horizontal')) }}
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">New User</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name <em class="labeldanger">*</em></label>
                    {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Enter Name', 'required')) }}
                </div>
                <div class="form-group">
                    <label for="email">Email<em class="labeldanger">*</em></label>
                    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'required')) }}
                </div>
                <div class="form-group">
                    <label for="address">Address<em class="labeldanger">*</em></label>
                    {{ Form::textarea('address', null, array('rows'=>'5', 'class'=>'form-control', 'placeholder'=>'Address', 'required')) }}
                </div>
                <div class="form-group">
                    <label for="phone">Phone<em class="labeldanger">*</em></label>
                    {{ Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'Enter Phone no', 'required')) }}
                </div>
                <div class="form-group">
                    <label for="id_role">Role Type<em class="labeldanger">*</em></label>
                    {{ Form::select('id_role',  $roles, array('class'=>'form-control', 'required')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Login Info</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Username <em class="labeldanger">*</em></label>
                    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Enter Username', 'required')) }}
                </div>
                <div class="form-group">
                    <label for="password">Password<em class="labeldanger">*</em></label>
                    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Enter Password', 'required')) }}
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password<em class="labeldanger">*</em></label>
                    {{ Form::password('confirm-password', array('class'=>'form-control', 'placeholder'=>'Renter Password', 'required')) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-4 control-label">
        {{ Form::submit('Register', array('class'=>'btn btn-lg btn-primary'))}}
        &nbsp;&nbsp;
        <a href="{{ URL::route('user.index') }}" class="btn btn-lg btn-primary">Cancel</a>
    </div>
</div>
{{ Form::close() }}


@endsection
