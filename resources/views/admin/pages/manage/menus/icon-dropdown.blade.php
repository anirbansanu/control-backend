@forelse ($icons as $item)
    <a class="dropdown-item" href="#" data-id="{{ $item->id }}" data-title="{{ $item->title }}" >
        <i class="{{$item->title}}"></i> <span class="px-2">{{ $item->title }}</span>
    </a>
@empty
    No Icons
@endforelse
