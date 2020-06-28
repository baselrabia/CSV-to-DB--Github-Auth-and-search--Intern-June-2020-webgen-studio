@extends('layouts.index')

@section('content')
<div class="container">

<div class="row">

    <div class="box bg-light mt-3">
        <div class="box-header">
           Excel to database
        </div>
        <div class="box-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                 <input type="submit" class="btn btn-success" value="Import CSV Data" disabled />
                <a class="btn btn-warning" href="{{ route('export') }}">Export CSV Data</a>
                <a class="btn btn-danger" href="{{ route('drop') }}">Drop All Data</a>

            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        {!! Form::open(['id'=>'form_data','url'=>'clientdeal/destroy/all','method'=>'delete']) !!}

            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}

        {!! Form::close() !!}

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Modal -->
<div id="mutlipleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('ClientDeal.delete') }}</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger">
        	<div class="empty_record hidden">
        	<h4>{{ trans('ClientDeal.please_check_some_records') }} </h4>
        	</div>
        	<div class="not_empty_record hidden">
        	<h4>{{ trans('ClientDeal.ask_delete_itme') }} <span class="record_count"></span> ? </h4>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<div class="empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('ClientDeal.close') }}</button>
      	</div>
      	<div class="not_empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('ClientDeal.no') }}</button>
        <input type="submit"  value="{{ trans('ClientDeal.yes') }}"  class="btn btn-danger del_all" />
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@push('js')
<script>
  delete_all();

    $(document).ready(
        function(){
            $('input:file').change(
                function(){
                    if ($(this).val()) {
                        $('input:submit').attr('disabled',false);
                        // or, as has been pointed out elsewhere:
                        // $('input:submit').removeAttr('disabled');
                    }
                }
                );
        });
</script>

{!! $dataTable->scripts() !!}

@endpush

@endsection
