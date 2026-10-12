@extends('admin.layout')

@section('title', 'Contact Messages')

@section('content')

  <h2 class="h5 mb-3">Contact Messages</h2>

  <div class="admin-card p-3">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>From</th>
            <th>Type</th>
            <th>Subject</th>
            <th>Received</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($messages as $message)
            <tr>
              <td>{{ $message->name }}<br><span class="text-muted small">{{ $message->email }}</span></td>
              <td class="text-capitalize">{{ str_replace('-', ' ', $message->inquiry_type) }}</td>
              <td>{{ $message->subject ?? '—' }}</td>
              <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
              <td class="text-end">
                <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-outline-secondary">View</a>
                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-muted text-center py-4">No messages yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-3">
      {{ $messages->links() }}
    </div>
  </div>

@endsection
