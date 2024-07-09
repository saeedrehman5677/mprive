@extends('layouts.admin')
@section('content')
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
            <table class=" table  table-hover ajaxTable datatable datatable-Viewing">
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
            </table>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('viewing_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.viewings.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
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

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.viewings.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'date', name: 'date' },
                    { data: 'time', name: 'time' },
                    { data: 'property_title', name: 'property.title' },
                    { data: 'property.location', name: 'property.location' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 50,
            };
            let table = $('.datatable-Viewing').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
