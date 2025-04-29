<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @isset($breadcrumb)
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb->title ?? 'Page Title' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach($breadcrumb->list ?? ['Home'] as $key => $value)
                            @if($key == count($breadcrumb->list ?? []) - 1)
                                <li class="breadcrumb-item active">{{ $value }}</li>
                            @else
                                <li class="breadcrumb-item">{{ $value }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            @else
                <div class="col-sm-12">
                    <h1>Page Title</h1>
                </div>
            @endisset
        </div>
    </div>
</section>