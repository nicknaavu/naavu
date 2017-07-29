@if($form == 'link')
  <a href="{{ route('project',['id'=>$project->id])   }}">{{$project->project}}</a>
@elseif($form == 'full')
  <div class='clickable' target="{{ route('project',['id'=>$project->id])   }}">
    <h4>{{$project->project}}</h4><br/>
    <?php echo create_links($project->description) ?>
  </div>
@endif
