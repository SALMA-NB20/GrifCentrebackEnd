<!-- ... existing code ... -->
<tbody>
    @foreach($schedules as $schedule)
    <tr>
        <td>{{ $schedule->matier }}</td>
        <td>{{ $schedule->day }}</td>
        <td>{{ $schedule->start_time }}</td>
        <td>{{ $schedule->end_time }}</td>
        <td>
            <a href="{{ route('schedule.edit', $schedule->id) }}" class="action-btn">UPDATE</a>
            <a href="{{ route('schedule.delete', $schedule->id) }}" class="action-btn">DELETE</a>
        </td>
    </tr>
    @endforeach
</tbody>
<!-- ... existing code ... -->