<table cellspacing="0" class="table" id="order-listing" width="100%">
    <thead>
        <th>#</th>
        <th>@lang('locale.parameter', ['suffix'=>'s'])</th>
        <th>@lang('locale.value')</th>
        <th>@lang('locale.min')</th>
        <th>@lang('locale.max')</th>
    </thead>
    <tbody>
        @foreach($parameters as $key => $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>@lang('locale.'.$key)</td>
            <td>
                <x-text-input id="{{ $key }}" type="text" name="{{ $key }}" :value="$item['value']" placeholder="{{ __('locale.'.$key) }}" required />
            </td>
            <td>{{ $item['min'] }}</td>
            <td>{{ $item['max'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<x-app-button class="btn-primary btn-block">@lang('locale.submit')</x-app-button>
<script>
    $(function() {
        'use strict'
        $('#order-listing').DataTable({ responsive: true, })
    })
</script>
