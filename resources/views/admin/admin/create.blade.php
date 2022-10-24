@extends('admin.layouts.master')

@section('top_title') أداره الموقع  @endsection

@section('main_title') اضافه مدير جديد  @endsection


@section('header') 
    <style>
        .card-body .col-lg-12 { margin-bottom: 20px }
    </style>
@endsection


@section('content')

@include('flash-message')

<!-- Start Row -->
<div class="row">

   <div class="col-md-12">

      <!--begin::Card-->
      <div class="card card-custom gutter-b example example-compact">

         <div class="card-header">
            <h3 class="card-title">اضافه مدير جديد</h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/admin", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}
            
            <div class="card-body">
              
                <div class="col-lg-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>  الاسم  <span class="text-danger">*</span> </label>
                    
                    <input type="text" name="name" class="form-control m-input" required="required" value="{{ old('name') }}" placeholder=" الاسم ">
                    
                    @if ($errors->has('name'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('name') }} </strong>
                         </span> 
                    @endif
                </div>
                
                <div class="col-lg-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>   البريد الالكتروني  <span class="text-danger">*</span>  </label>
                    
                    <input type="email" name="email" class="form-control m-input" required="required" value="{{ old('email') }}" placeholder="  البريد الالكتروني  ">
                    
                    @if ($errors->has('email'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('email') }} </strong>
                         </span> 
                    @endif
                </div>
                
                
                <div class="col-lg-12 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label>  رقم الموبيل  <span class="text-danger">*</span> </label>
                    
                    <input type="text" name="mobile" class="form-control m-input" required="required" value="{{ old('mobile') }}" placeholder=" رقم الموبيل   ">
                    
                    @if ($errors->has('mobile'))
                         <span class="help-block" style="color:red">
                              <strong>{{ $errors->first('mobile') }} </strong>
                         </span> 
                    @endif
                </div>

                
                
                <div class="col-lg-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                   <label> كلمة المرور  <span class="text-danger">*</span>  </label>
                   
                   <input type="password" name="password" class="form-control m-input" required="required" value="" placeholder="  كلمة المرور  ">
                   
                   @if ($errors->has('password'))
                        <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('password') }} </strong>
                        </span> 
                   @endif
               </div>

               
               
            </div>

            <div class="card-footer">
               <button type="submit" form="add" class="btn btn-primary mr-2">حفظ</button>
            </div>

        {!! Form::close() !!}
         <!--end::Form-->


      </div>
      <!--end::Card-->

   </div>


   
</div>
<!-- End Row -->

@endsection