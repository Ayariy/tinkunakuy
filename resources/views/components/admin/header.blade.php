<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$title}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($rutaHeader as $ruta)
                    <li class="breadcrumb-item"><a href="{{$ruta['href']}}">{{$ruta['nombreRuta']}}</a></li>
                    @endforeach

                </ol>
            </div><!-- /.col -->
            {{-- {{dd($rutaHeader)}} --}}
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div