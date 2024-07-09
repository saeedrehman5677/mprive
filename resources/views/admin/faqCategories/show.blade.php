@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.faqCategory.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.faq-categories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table ">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.faqCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $faqCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faqCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $faqCategory->name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.faq-categories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#category_faqs" role="tab" data-toggle="tab">
                    {{ trans('cruds.faq.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="category_faqs">
                @includeIf('admin.faqCategories.relationships.categoryFaqs', ['faqs' => $faqCategory->categoryFaqs])
            </div>
        </div>
    </div>

@endsection
