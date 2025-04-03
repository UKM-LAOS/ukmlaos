@props(['breadcrumbs'])
<div class="breadcrumb mb-24">
    <ul class="flex-align gap-4">
        <li><a href="{{ route('course.dashboard.index') }}"
                class="text-gray-200 fw-normal text-15 hover-text-main-600">Dashboard</a></li>
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                <li><span class="text-main-600 fw-normal text-15">{{ $breadcrumb['name'] }}</span></li>
            @else
                <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                <li><a href="{{ $breadcrumb['url'] }}"
                        class="text-gray-200 fw-normal text-15 hover-text-main-600">{{ $breadcrumb['name'] }}</a></li>
            @endif
        @endforeach
    </ul>
</div>
