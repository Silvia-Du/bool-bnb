<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/front/style.css') }}">
    {{-- Js script --}}
    <script src="{{ asset('js/front/front.js') }}" defer></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- TomTom Map --}}
    <link  rel='stylesheet'  type='text/css'  href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <script>(function(){ window.SS = window.SS || {}; SS.Require = function (callback){ if (typeof callback === 'function') { if (window.SS && SS.EventTrack) { callback(); } else { var siteSpect = document.getElementById('siteSpectLibraries'); var head = document.getElementsByTagName('head')[0]; if (siteSpect === null && typeof head !== 'undefined') { siteSpect = document.createElement('script'); siteSpect.type = 'text/javascript'; siteSpect.src = '/__ssobj/core.js+ssdomvar.js+generic-adapter.js';siteSpect.async = true; siteSpect.id = 'siteSpectLibraries'; head.appendChild(siteSpect); } if (window.addEventListener){ siteSpect.addEventListener('load', callback, false); } else { siteSpect.attachEvent('onload', callback, false); } } } };})(); </script>


    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



    <title>Bool BnB</title>
</head>
<body>

    <div id="app"></div>

    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>

    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script>
</body>
</html>

