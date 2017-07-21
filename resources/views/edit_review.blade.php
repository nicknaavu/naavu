@extends('layouts.app')

@section('content')

<div class='container'>
  <div class="row">
    <div class='col-md-8 col-md-offset-2'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h2>Leave a review</h2>
        </div>
        <div class='panel-body'>



          <form role='form' class="form-horizontal" method='post' action='{{ route('update_review') }}'>
            {{csrf_field()}}

            <input type='hidden' name='id' value="{{ $review->id }}">

            <div class='form-group'>
              <label for='subject' class='col-md-4 control-label'>Subject</label>
              <div class='col-md-6'>
                <input class='form-control' name='subject' id='subject' value="{{ $review->subject }}" required>
              </div>
            </div>

            <div class='form-group'>
              <label for='body' class='col-md-4 control-label'>Body</label>
              <div class='col-md-6'>
                <textarea class='form-control vertical' name='body' id='body' required>{{ $review->body }}</textarea>
              </div>
            </div>


            <div class="form-group">
              <div class='col-md-6 col-md-offset-2'>
                <a href="{{ route('profile_by_id',['id'=>$review->reviewee->id]) }}" class='btn btn-danger'>cancel</a>
                <a href="{{ route('delete_review',['id'=>$review->id]) }}" class='btn btn-danger'>delete review</a>
                <input type='submit' class='btn btn-default' value='save'>
              </div>

            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>





@endsection
