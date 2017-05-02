<!DOCTYPE HTML>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap - Latest compiled and minified CSS -->
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>NAAVU</title>

  </head>

  <body>

    <div class='container'>
      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-naavu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">NAAVU</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopop="true" aria-expanded="false">Profiles<span class='caret'></span></a>
                <ul class='dropdown-menu'>
                  <li><a href='/profile'>My profile</a></li>
                  <li><a href='/profile_browser'>Profiles</a></li>
                </ul>
              </li>
              <li><a href='/add_user'>Create account</a></li>
              <li><a href='/project_browser'>Projects</a></li>
              <li><a href='/add_post'>compose post</a></li>
              <li class='dropdown'>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Messages<span class="caret"></span></a>
                <ul class='dropdown-menu'>
                  <li><a href='/add_message'>compose message</a></li>
                  <li><a href='/message_browser'>my messages</a></li>
                </ul>
              </li>
              <li><a href='/notification_browser'>my notifications</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href='/logout'>logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
      </nav>

  @yield('content')


  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Bootstrap - Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script language='javascript'>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  </script>
  @yield('script')
  </body>
</html>
