<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Payload</th>
            <th class="th-action"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($jobs as $job)
        <tr>
            <td>{{ $job->id }}</td>
            <td>
                <strong>{!! array_get($job->payload, 'job') !!}</strong>
                <pre>
                    <code>{!! json_encode(array_except($job->payload, 'job')) !!}</code>
                </pre>
            </td>
            <td></td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>
