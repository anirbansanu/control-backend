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
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%" class="text-center">
                        #
                    </th>
                    <th style="width: 20%" class="text-left">
                        
                            Title
                      
                        <small>
                            Subtitle
                        </small>
                    </th>
                    <th class="text-left" style="width: 20%">
                        Route
                    </th>
                    <th class="text-right pr-4">
                        Icon
                    </th>
                    <th class="text-left">
                        Color Code
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%" class="text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $ky=>$item)
                    <tr>
                        <td class="text-center">
                            {{$ky}}
                        </td>
                        <td class="text-left">
                            <a href="#">
                                {{$item->title}}
                            </a>
                            <br>
                            <small>
                                {{$item->subtitle}}
                            </small>
                        </td>
                        <td class="text-left"> 
                            {{$item->route}}
                        </td>
                        <td class="text-right pr-1">
                            <p class="d-flex justify-content-end display-4" style="color: {{$item->color_code}}">
                                <i class="{{$item->icon}}"></i>
                            </p>
                        </td>
                        
                        <td class="text-left">
                            {{$item->color_code}}
                        </td>
                        <td class="project-state">
                            @if ($item->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>
                        <td class="project-actions text-center">
                            @if (!$item->status)
                                <a class="btn btn-success btn-sm" href="{{route('admin.manage.menus.status',$item->id)}}" data-url={{route('admin.manage.menus.status',$item->id)}}>
                                    <i class="fa-solid fa-play"></i>
                                    Active
                                </a>
                            @else
                                <a class="btn btn-primary btn-sm" href="{{route('admin.manage.menus.status',$item->id)}}" data-url={{route('admin.manage.menus.status',$item->id)}}>
                                    <i class="fa-solid fa-ban"></i>
                                    Inactive
                                </a>
                            @endif
                            <a class="btn btn-info btn-sm edit" href="{{route('admin.manage.menus.status',$item->id)}}">
                                <i class="fas fa-pencil-alt"> </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm delete" href="#" data-url={{route('admin.manage.menus.destroy',$item->id)}}>
                                <i class="fas fa-trash"> </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr> No Records </tr>
                @endforelse
                
                
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
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

        $(document).on("click",".status",function(ev) {
            ev.preventDefault();
            let url = $(this).data('url');

        });
    </script>
@endpush