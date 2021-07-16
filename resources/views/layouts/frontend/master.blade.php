<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <meta name="description" content="@yield('meta_desc')"/>
    <meta name="keywords" content="@yield('meta_keyword')"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css">
    <link rel="stylesheet" href="{{url('css/frontend.css')}}">
    <link rel="stylesheet" href="{{url('css/stylesheet.css')}}">
</head>
<body>
@include('frontend.partion.header')

@yield('contend')
@include('frontend.partion.footer')
</body>
</html>