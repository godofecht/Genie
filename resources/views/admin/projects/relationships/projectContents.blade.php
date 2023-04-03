<div class="m-3">
    @can('content_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.contents.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.content.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.content.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-projectContents">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.content.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.content.fields.project') }}
                            </th>
                            <th>
                                {{ trans('cruds.content.fields.prompt') }}
                            </th>
                            <th>
                                {{ trans('cruds.content.fields.tone') }}
                            </th>
                            <th>
                                {{ trans('cruds.content.fields.outputs_count') }}
                            </th>
                            <th>
                                {{ trans('cruds.content.fields.content') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contents as $key => $content)
                            <tr data-entry-id="{{ $content->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $content->id ?? '' }}
                                </td>
                                <td>
                                    {{ $content->project->title ?? '' }}
                                </td>
                                <td>
                                    {{ $content->prompt->title ?? '' }}
                                </td>
                                <td>
                                    {{ $content->tone->tone ?? '' }}
                                </td>
                                <td>
                                    {{ $content->outputs_count ?? '' }}
                                </td>
                                <td>
                                    {{ $content->content ?? '' }}
                                </td>
                                <td>
                                    @can('content_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.contents.show', $content->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('content_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.contents.edit', $content->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('content_delete')
                                        <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('content_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-projectContents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
