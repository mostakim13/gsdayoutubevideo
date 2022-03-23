<link rel="stylesheet" type="text/css" href="{{ asset('css/assets.css')}}">

<!-- TYPOGRAPHY ============================================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/typography.css')}}">

<!-- SHORTCODES ============================================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes/shortcodes.css')}}">

<!-- STYLESHEETS ============================================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('css/color/color-1.css')}}">

<!-- REVOLUTION SLIDER CSS ============================================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/revolution/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/revolution/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/revolution/css/navigation.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{asset('backend')}}/lib/toastr/toastr.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
<link rel="stylesheet" href="{{ asset('common' )}}/modal-video.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('venobox') }}/venobox/venobox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .geeks {
        width: 270px;
        height: 8px;
        background: #800080;
        position: absolute;
        top: 50%;
        left: 13%;
        transform: translate(-50%, -50%);
    }

    .geeks::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        animation: animate 5s linear infinite;
    }

    @keyframes animate {
        0% {
            left: 0;
        }

        50% {
            left: 100%;
        }

        0% {
            left: 0;
        }
    }
</style>
