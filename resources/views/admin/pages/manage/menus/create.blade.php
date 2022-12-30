@extends('admin.layouts.app')
@section('title', 'Create Menu')
@section('breadcrumb')
@include('admin.layouts.breadcrumbs', [
    'breadcrumbs' => [
        'Dashboard' => "admin.dashboard",
        'Manage Menus' => 'admin.manage.menus.index',
        'Create' => ''
    ],
])
@endsection
@push('css')
{{-- <link href="{{ asset('user/css/style.css') }}" rel="stylesheet"> --}}
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

<style>
.menu-card-body{
    
}
/* Profile */
.image-circle{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: #ec8a2e;
    border-width: 2px;
}
.menu-card{
    background: #222;
    text-decoration: none;
    height: 190px;
    border-radius: 8px;
    color: rgb(241, 233, 233);
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    overflow: hidden;
    transition: 0.25s;
    cursor: pointer;
    -webkit-user-select: none;  /* Chrome all / Safari all */
  -moz-user-select: none;     /* Firefox all */
  -ms-user-select: none;      /* IE 10+ */
  user-select: none;          /* Likely future */      
}

.menu-card::before{
    content: "";
    position: absolute;
    top:0;
    left: 0;
    width: 50%;
    height:100%;
    background: linear-gradient(to left, rgba(255, 255, 255, 0.14), transparent);
    transform: skewX(45deg) translateX(0);
    transition: 0.3s;
}
.menu-card:hover:before{
transform: skewX(45deg) translateX(200%);
}
.menu-card-title{
    width: 100%;
    letter-spacing: 2px;
    display: flex;
    justify-content: center;
}

.menu-card:hover{
    color:antiquewhite;
    transform: scale(1.03);
    box-shadow: 0 10px 20px rgba(253, 251, 251, 0.12), 0 4px 8px rgba(255,255,255,.06);
   
}
.mdl-text-card{
    text-overflow: ellipsis;
}
.mdl-text{
    font-weight: bolder;
    letter-spacing: 3px;
    
}

</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Preview of Menu Card</h3>
                </div>
                <div class="card-body menu-card-body" id="menu-card-body">
                    <a href="#" class="card menu-card">
                        <div class="p-3 pt-4 p-md-4 card-body">
                            <div class="card-title h5 pb-3 menu-card-title">
                                <font style="font-size: 0.8rem;">
                                    Subtitle
                                    <b style="font-weight: 950;font-size: 1.2rem;">Title</b>
                                </font>       
                            </div>
                            <div class="w-100 h-100 d-flex justify-content-center display-2">
                                <i class="fa-solid fa-icons"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <form action={{route('admin.manage.menus.store')}} method="POST" class="card card-info">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add Menu Card</h3>
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
                    {{-- Icon Curl Request --}}
                    {{-- curl -H "Content-Type: application/json" \-d '{ "query": "query { search(version: \"6.x\", query: \"coff\") { id } }" }' \https://api.fontawesome.com --}}

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
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
        $('form').on("keyup change paste","input, select, textarea",function(){
            console.log($(this).attr('name'),$(this).val());
            let title = $("input[name='title']").val();
            let subtitle = $("input[name='subtitle']").val();
            let menu_icon = $("input[name='menu_icon']").val();
            let menu_link = $("input[name='menu_link']").val();
            let color_code = $("input[name='color_code']").val();
            $('#menu-card-body').html('<a href="'+menu_link+'" class="card menu-card" style="background:'+color_code+'"> <div class="p-3 pt-4 p-md-4 card-body"> <div class="card-title h5 pb-3 menu-card-title"> <font style="font-size: 0.8rem;">'+subtitle+' <b style="font-weight: 950;font-size: 1.2rem;">'+title+'</b> </font> </div> <div class="w-100 h-100 d-flex justify-content-center display-2"> <i class="'+menu_icon+'"></i> </div> </div> </a>');
        });
    </script>
@endpush