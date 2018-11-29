<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('layouts.head')
    <body>
    <div data-fullsize="{{URL::to('/images/back_img.jpg')}}" class="progressive-bg bg_img"></div>
      <div class="login_signup">
      <div class="form_box">
          <div data-fullsize="{{URL::to('/images/login_left_img.jpg')}}" class="progressive-bg left">
                <a href="{{route('main')}}"><img alt="" src="{{ asset('images/logo_welcome.svg') }}"></a>
          </div>
          @yield('content')
      </div>
      </div>
    <script src = "{{URL::to('js/scripts.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </body>
</html>
