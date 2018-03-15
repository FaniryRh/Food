<tr data-index="{{ $index }}">
    <td>{!! Form::number('inventaires_simples['.$index.'][quantite]', old('inventaires_simples['.$index.'][quantite]', isset($field) ? $field->quantite: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>