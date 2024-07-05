<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="Jobboard">
<title>JobBoard</title>

<link rel="shortcut icon" href="{{asset('frontasset/assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('frontasset/assets/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('frontasset/assets/css/jasny-bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('frontasset/assets/css/bootstrap-select.min.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/css/material-kit.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/fonts/font-awesome.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('frontasset/assets/fonts/themify-icons.css')}}">

<link rel="stylesheet" href="{{asset('frontasset/assets/css/color-switcher.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/extras/animate.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/extras/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('frontasset/assets/extras/owl.theme.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/extras/settings.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/css/slicknav.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/css/main.css')}}" type="text/css">

<link rel="stylesheet" href="{{asset('frontasset/assets/css/responsive.css')}}" type="text/css">

<link rel="stylesheet" type="text/css" href="{{asset('frontasset/assets/css/colors/red.css')}}" media="screen">
<style>
    #map { width:100%;height:50%;padding:0;margin:0; }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        }

        /*hides the radio buttons*/
        .rating > input{ display:none;}

        /*style the empty stars, sets position:relative as base for pseudo-elements*/
        .rating > label {
        position: relative;
        width: 1.1em;
        font-size: 4vw;
        color: #FFD700;
        cursor: pointer;
        }

        /* sets filled star pseudo-elements */
        .rating > label::before{ 
        content: "\2605";
        position: absolute;
        opacity: 0;
        }
        /*overlays a filled start character to the hovered element and all previous siblings*/
        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
        opacity: 1 !important;
        }

        /*overlays a filled start character on the selected element and all previous siblings*/
        .rating > input:checked ~ label:before{
        opacity:1;
        }

        /*when an element is selected and pointer re-enters the rating container, selected rate and siblings get semi transparent, as reminder of current selection*/
        .rating:hover > input:checked ~ label:before{ opacity: 0.4; }

        /*just aesthetics*/
        p{ font-size: 1.2rem;}
        @media only screen and (max-width: 600px) {
        h1{font-size: 14px;}
        p{font-size: 12px;}
        }
</style>