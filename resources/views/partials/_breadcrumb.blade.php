<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$breadcrumbs[0] ?? 'Dashboard'}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    @if (! empty($breadcrumbs))
                        @foreach ($breadcrumbs as $label => $link)
                            @if (is_int($label) && ! is_int($link))
                                <li class="breadcrumb-item active">{{ $link }}</li>
                            @else
                                <li class="breadcrumb-item"><a href="{{ $link }}">{{ $label }}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
