@can('viewing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.viewings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.viewing.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.viewing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table  table-hover datatable datatable-propertyViewings">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.viewing.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.viewing.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.viewing.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.viewing.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.viewing.fields.time') }}
                    </th>
                    <th>
                        {{ trans('cruds.viewing.fields.property') }}
                    </th>
                    <th>
                        {{ trans('cruds.sale.fields.location') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($viewings as $key => $viewing)
                    <tr data-entry-id="{{ $viewing->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $viewing->name ?? '' }}
                        </td>
                        <td>
                            {{ $viewing->email ?? '' }}
                        </td>
                        <td>
                            {{ $viewing->phone ?? '' }}
                        </td>
                        <td>
                            {{ $viewing->date ?? '' }}
                        </td>
                        <td>
                            {{ $viewing->time ?? '' }}
                        </td>
                        <td>
                            {{ $viewing->property->title ?? '' }}
                        </td>
                        <td>
                            {{ $viewing->property->location ?? '' }}
                        </td>
                        <td>
                            @can('viewing_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.viewings.show', $viewing->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan

                            @can('viewing_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.viewings.edit', $viewing->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('viewing_delete')
                                <form action="{{ route('admin.viewings.destroy', $viewing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('viewing_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.viewings.massDestroy') }}",
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
                pageLength: 50,
            });
            let table = $('.datatable-propertyViewings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
