<!DOCTYPE html>
<html>

<head>
    <title>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">


        <div class="row">
            <div class="col-md-2 col-md-offset-6 text-right">
                <strong>Select Language: </strong>
            </div>
            {{-- <h2>{{(parse_url(URL::current(), PHP_URL_SCHEME))}}</h2> --}}
 

            {{-- <h1>{{dd(URL::current())}}</h1> --}}
            {{-- <a href="http://ki.localhost:8000/home">Ki</a>
            <a href="http://es.localhost:8000/home">Es</a> --}}
            <a href="{{str_replace(parse_url(URL::current(), PHP_URL_HOST),"ki.".explode(".",parse_url(URL::current(), PHP_URL_HOST))[1], URL::current())}}">Ki</a>
            <a href="{{str_replace(parse_url(URL::current(), PHP_URL_HOST),"es.".explode(".",parse_url(URL::current(), PHP_URL_HOST))[1], URL::current())}}">Es</a>
            {{-- <div class="col-md-4">
                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="ki" {{ session()->get('locale') == 'ki' ? 'selected' : '' }}>Kichwa</option>
                    <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Español</option>
                </select>
            </div> --}}
        </div>

        <h1>{{ __('messages.title') }}</h1>
        <h1>{{ app()->getLocale()  }}</h1>

    </div>
</body>

{{-- <script type="text/javascript">

//  let url = "{{route('changeLang','es')}}" 
$(".changeLang").change(function() {
    
    let val = $(this).val();
    let url =  "{{url('lang')}}/"+val;
    window.location.href = url;
});
</script> --}}

</html>