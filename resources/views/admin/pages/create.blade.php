@extends('admin.layouts.master')

@section('top_title') الصفحات  @endsection

@section('main_title') اضافه صفحة جديدة  @endsection


@section('header')
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6 { margin-bottom: 20px }
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
            <h3 class="card-title">اضافه صفحة جديدة </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/pages", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">

                    <div class="col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  اسم الصفحة  <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ old('title') }}" placeholder=" اسم الصفحة">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>  وصف مطول <span class="text-danger">*</span>  </label>
                        <textarea name="description" required id="editor1" class="form-control" placeholder=" وصف مطول ">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('description') }} </strong>
                            </span>
                        @endif
                    </div>

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

@section('footer')

    <script src="{{ asset('files/admin/ckeditor/ckeditor.js') }}"></script>

     <script>
            CKEDITOR.replace( 'editor1');
     </script>

@endsection

