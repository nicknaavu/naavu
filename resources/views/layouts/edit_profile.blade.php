@extends('layouts.app')

@section('style')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class='container'>
  <div class='row'>
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <ul class="nav nav-pills">
            <?php
              $nav = [
                'Basic info'=>'edit_profile',
                'Skills'=>'edit_skill',
                'Interests'=>'edit_interest',
                'Projects'=>'edit_projects'
              ];
            ?>
            @foreach($nav as $x=>$y)
              <li role="presentation" @if(Route::currentRouteName() == $y) class=active @endif ><a href="@unless(Route::currentRouteName() == $y) {{ route($y)}} @else # @endif">{{$x}}</a></li>
            @endforeach
          </ul>

        </div>
        <div class='panel-body'>

          @yield('controls')

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
