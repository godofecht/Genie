<div class="m-3">
    @can('prompt_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.prompts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.prompt.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.prompt.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-categoryPrompts">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.prompt.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.prompt.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.prompt.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.prompt.fields.category') }}
                            </th>
                            <th>
                                {{ trans('cruds.prompt.fields.question') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prompts as $key => $prompt)
                            <tr data-entry-id="{{ $prompt->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $prompt->id ?? '' }}
                                </td>
                                <td>
                                    {{ $prompt->title ?? '' }}
                                </td>
                                <td>
                                    {{ $prompt->description ?? '' }}
                                </td>
                                <td>
                                    {{ $prompt->category->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($prompt->questions as $key => $item)
                                        <span class="badge badge-info">{{ $item->question }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('prompt_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.prompts.show', $prompt->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('prompt_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.prompts.edit', $prompt->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('prompt_delete')
                                        <form action="{{ route('admin.prompts.destroy', $prompt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('prompt_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.prompts.massDestroy') }}",
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
  let table = $('.datatable-categoryPrompts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
