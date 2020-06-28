<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_ClientDeal{{ $id }}"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_ClientDeal{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('ClientDeal.delete') }}</h4>
      </div>
      {!! Form::open(['route'=>['clientdeal.destroy',$id],'method'=>'delete']) !!}
      <div class="modal-body">
        <h4>{{ trans('ClientDeal.delete_this') }}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('ClientDeal.close') }}</button>
        {!! Form::submit(trans('ClientDeal.yes'),['class'=>'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>
