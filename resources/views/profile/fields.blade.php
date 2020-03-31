<div class="form-group col-sm-6">
    <label>Name<span style="color:red;"> *</span></label>
    {!! Form::text('name', null, ['class' => 'form-control','required', 'pattern'=>'[a-zA-Z _]*$','oninvalid'=>"setCustomValidity('Enter only Alphabet')",
  'onchange'=>"try{setCustomValidity('')}catch(e){}"]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    <label>Email<span style="color:red;"> *</span></label>
    {!! Form::email('email', null, ['class' => 'form-control','required','id'=>'myEmail','name'=>'email','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$','oninvalid'=>"setCustomValidity('Enter Valid Email Address')",
                    'onchange'=>"try{setCustomValidity('')}catch(e){}"]) !!}</div>

<!-- Password Field -->
<div class="form-group col-sm-3">
    <label>Password</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-3">
    <label>Confirm-Password</label>
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-3">
    <label>Phone</label>
    {!! Form::text('phone', null, ['class' => 'form-control','pattern'=>'[0-9]{10}','maxLength'=>'10','oninvalid'=>"setCustomValidity('Enter only numeric and must be 10 digit')",
  'onchange'=>"try{setCustomValidity('')}catch(e){}"]) !!}
</div>

<div class="form-group col-sm-3 ">
    {!! Form::label('photo', 'Photo') !!}
    <div class="input-group-btn">
        <div class="col-sm-1" style="width: 11.333333%;">
            <span class="btn btn-primary btn-file" style="margin-right: 5px;margin-left: -17px;">
                <div id="lb">Upload</div>
                {!! Form::file('photo',['id'=>'editUserImage']) !!}
            </span>
        </div>
    </div>
    <div class="text-right" style="margin-top: -55px; margin-right: 170px;">
        <img id='edit_preview_photos' class="img-thumbnail" width="100px;"
             src="{{asset($user->image_path)}}"/>
    </div>
</div>
<!-- Submit Field -->

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('/users') !!}" class="btn btn-default" style="margin-left: 5px">Cancel</a>
</div>
