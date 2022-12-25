@if(!empty($breadcrumbs))
    <ol class="breadcrumb float-sm-right">
        @foreach($breadcrumbs as $name => $url)
            @if($url == '')
                <li class="breadcrumb-item active">{{ $name }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ route($url) }}">{{ $name }}</a></li>
            @endif
        @endforeach
    </ol>
@endif