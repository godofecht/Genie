@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.prompt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prompts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.id') }}
                        </th>
                        <td>
                            {{ $prompt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.status') }}
                        </th>
                        <td>
                            {{ $prompt->status }}
                        </td>
                    </tr>
                    @feature('image-prompts')
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Prompt::TYPE_SELECT[$prompt->type] ?? '' }}
                        </td>
                    </tr>
                    @endfeature
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.title') }}
                        </th>
                        <td>
                            {{ $prompt->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.description') }}
                        </th>
                        <td>
                            {{ $prompt->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.category') }}
                        </th>
                        <td>
                            {{ $prompt->category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prompt.fields.question') }}
                        </th>
                        <td>
                            @foreach($prompt->questions as $key => $question)
                                <span class="label label-info">{{ $question->question }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prompts.index') }}">
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
            <a class="nav-link" href="#prompt_contents" role="tab" data-toggle="tab">
                {{ trans('cruds.content.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="prompt_contents">
            @includeIf('admin.prompts.relationships.promptContents', ['contents' => $prompt->promptContents])
        </div>
    </div>
</div>

@endsection
