@extends('admin.layouts.app')
@section('title', 'Manage Menus')
@section('breadcrumb')
@include('admin.layouts.breadcrumbs', [
    'breadcrumbs' => [
        'Dashboard' => "admin.dashboard",
        'Manage Menus' => ''
    ],
])
@endsection
@push('css')
{{-- <link href="{{ asset('user/css/style.css') }}" rel="stylesheet"> --}}
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Preview of Menu Card</h3>
                </div>
                <div class="card-body">
                    <a href="#" class="card" style="background: #222;text-decoration:none">
                        <div class="p-3 pt-4 p-md-4 card-body">
                            <div class="card-title h5 pb-3" style="display: flex; justify-content: center; align-items: center;">
                                <font style="font-size: 0.8rem;">
                                    Subtitle
                                    <b style="font-weight: 950;font-size: 1.2rem;">Title</b>
                                </font>       
                            </div>
                            <div class="w-100 h-100 d-flex justify-content-center">
                                <i class="fa-solid fa-icons"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Input Addon</h3>
                </div>
                <div class="card-body">
                
        
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style=" font-weight: bolder;">Tittle</span>
                        </div>
                        <input type="text" name="title" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa-solid fa-heading"></i></div>
                        </div>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style=" font-weight: bolder;">Sub Title</span>
                        </div>
                        <input type="text" name="subtitle" class="form-control">
                        <div class="input-group-append">
                        <div class="input-group-text"><i class="fa-solid fa-closed-captioning"></i></div>
                        </div>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style=" font-weight: bolder;">Menu Icon</span>
                        </div>
                        <input type="text" name="menu_icon" class="form-control">
                        <div class="input-group-append">
                        <div class="input-group-text"><i class="fa-solid fa-icons"></i></div>
                        </div>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style=" font-weight: bolder;">Menu Link</span>
                        </div>
                        <input type="text" name="menu_link" class="form-control">
                        <div class="input-group-append">
                        <div class="input-group-text"><i class="fa-solid fa-link"></i></div>
                        </div>
                    </div>
                    <!-- /.row -->
            
                    
                    <div class="form-group mt-3">
                        <label>Pick a color</label>
      
                        <div class="input-group my-colorpicker2" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" style=" font-weight: bolder;">Color Code</span>
                            </div>
                            <input type="text" name="color_code" class="form-control" data-original-title="" title="">
      
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group mt-3">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('js')
    <!-- bootstrap color picker -->
    <script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script>
        //color picker with addon
        $('.my-colorpicker2').colorpicker();

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

    </script>
@endpush