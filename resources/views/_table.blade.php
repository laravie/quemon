<table class="table table-striped">
    <thead>
        <tr>
            <th>Payload</th>
            <th class="th-action"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($jobs as $job)
        <tr>
            <td>
                <strong>{!! array_get($job->payload, 'job', 'Closure') !!}</strong>
                <pre>{!! json_encode(array_get($job->payload, 'data'), JSON_PRETTY_PRINT) !!}</pre>
            </td>
            <td></td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ trans('orchestra/foundation::label.no-data') }}</td>
        </tr>
        @endforelse
    </tbody>
</table>

{!! $jobs->render() !!}
