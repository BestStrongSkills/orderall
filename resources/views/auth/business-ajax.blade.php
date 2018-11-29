

<div class="right">
  <ul class="custom_tab">
    <li id="login" class="logreg"><a href="{{ url('login') }}"><img alt="" src="{{ asset('images/user-o.svg') }}"> LOGIN</a></li>
    <li id="register" class="logreg"><a href="{{ url('register') }}"><img alt="" src="{{ asset('images/edit.svg') }}"> REGISTER</a></li>
    <li id="business-register" class="active logreg"><a href="{{ url('#') }}"><img alt="" src="{{ asset('images/suitcase.svg') }}"> BUSINESS</a></li>
  </ul>
    <div class="tab-content">
      <style media="screen">
        .invalid-feedback {color: red;}
      </style>

      <div class="tab-pane mt20 fade in active">
          <form method="POST" enctype="multipart/form-data" action="{{ route('register-business') }}">
              @csrf
              @if ($errors->has('ip'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('ip') }}</strong>
                </span>
              @endif
              <label>Follow the <a href="{{URL::to('business-guide')}}">setup guide</a> for businesses to get up and running with Orderall</label>
              <div class="form-group">
                  <input id="first_name" autocomplete="given-name" type="text" placeholder="{{ __('First Name') }}" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                  @if ($errors->has('first_name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  <input id="last_name" autocomplete="family-name" type="text" placeholder="{{ __('Last Name') }}" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                  @if ($errors->has('last_name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                  <input id="email" autocomplete="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group">

                  <input id="password" autocomplete="new-password" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group mb10">
                  <input id="password-confirm" autocomplete="new-password" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required>
              </div>
              <div class="form-group">
                  <input id="business-name" autocomplete="business-name" type="text" placeholder="{{ __('Business Name') }}" class="form-control{{ $errors->has('business-name') ? ' is-invalid' : '' }}" name="business_name" value="{{ old('business_name') }}" required>

                  @if ($errors->has('business-name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('business-name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                <label>We need evidence that shows that you own or run the business. This can be any file under two megabytes.</label>
                <label><a href="{{URL::to('/business-evidence')}}" target="_blank">What qualifies as evidence?</a></label>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('input[type="file"]').change(function(e){
                            var fileName = e.target.files[0].name;
                            if (fileName) {
                              $('#choose-filename').text(fileName);
                            }
                            else {
                              $('#choose-filename').text('Choose File');
                            }
                        });
                    });
                </script>

                <div class="field image-upload">
                    <label class="btn btn-default btn-file" style="width:100%;background-color: #f37620; border-color: #f16721;">
                      <span id="choose-filename">Upload business ownership evidence</span>{{ Form::file('business-evidence', ['id' => 'field-business-evidence', 'style' => 'display:none;', 'onchange' => 'myTest()']) }}
                    </label>
                </div>
                  <style>
                      .ui-widget-header{
                          background: #34b20b;
                          margin: 0!important;
                      }
                  </style>
                  <div id="progressbar" style="position: relative;text-align: center;vertical-align: middle; margin-top: 30px;border: none;">
                      <div class="progress-label" style="position: absolute;left: 0;right: 0;top:5px;">

                      </div>
                  </div>

                  <script>
                     function myTest(){
                         var progressbar = $( "#progressbar" ),
                             progressLabel = $( ".progress-label" );

                         progressbar.progressbar({
                             value: false,
                             change: function() {
                                 var pivot = progressbar.progressbar( "value" );
                                 if(pivot == false){
                                     pivot = 0;
                                 }
                                 progressLabel.text( pivot + "%" );
                             },
                             complete: function() {
                                 progressLabel.text( "Complete!" );
                             }
                         });

                         function progress() {
                             var val = progressbar.progressbar( "value" ) || 0;

                             progressbar.progressbar( "value", val + 2 );

                             if ( val < 99 ) {
                                 setTimeout( progress, 80 );
                             }
                         }

                         setTimeout( progress, 2000 );
                     }
                  </script>
                  @if ($errors->has('business-evidence'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('business-evidence') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                @if ($errors->has('tos'))
                    <span class="invalid-feedback">
                        <strong>You must agree to the terms of service, terms of service for businesses and privacy policy</strong>
                    </span>
                @endif
                  <label class="custom_check_box">
                  <input name="tos" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                  <span></span>
                  <input type="checkbox" >I agree to the <a target="_blank" href="{{URL::to('tos')}}">Terms of Service</a>, <a target="_blank" href="{{URL::to('business-tos')}}">Terms of Service for Businesses</a> and <a target="_blank" href="{{URL::to('privacy')}}">Privacy Policy</a>
                  </label>
              </div>

              <div class="form-group text-center pt5 mb0">
              <input type="submit" class="button01" value="Sign up" name="">
              </div>
          </form>

      </div>


    </div>
  </div>
