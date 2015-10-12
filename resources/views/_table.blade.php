#{{ $acl = Foundation::acl() }}
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
                <small>{{ $job->failed_at->diffForHumans() }}</small>
            </td>
            <td>
                @if($acl->can('manage orchestra'))
                <a href="{{ handles("orchestra::quemon/{$job->id}/retry", ['csrf' => true]) }}" class="btn btn-warning btn-mini">Retry</a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">{{ trans('orchestra/foundation::label.no-data') }}</td>
        </tr>
        @endforelse
    </tbody>
</table>

{!! $jobs->render() !!}
