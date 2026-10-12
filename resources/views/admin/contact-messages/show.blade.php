@extends('admin.layout')

@section('title', 'Message from ' . $message->name)

@section('content')

  <a href="{{ route('admin.contact-messages.index') }}" class="d-inline-block mb-3 small">&larr; Back to Messages</a>

  <div class="admin-card p-4" style="max-width: 700px;">
    <h2 class="h5 mb-1">{{ $message->subject ?? ucfirst(str_replace('-', ' ', $message->inquiry_type)) }}</h2>
    <p class="text-muted small mb-4">{{ $message->created_at->format('d M Y, h:i A') }}</p>

    <dl class="row mb-4">
      <dt class="col-sm-3">Name</dt>
      <dd class="col-sm-9">{{ $message->name }}</dd>

      <dt class="col-sm-3">Email</dt>
      <dd class="col-sm-9"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>

      @if($message->phone)
        <dt class="col-sm-3">Phone</dt>
        <dd class="col-sm-9">{{ $message->phone }}</dd>
      @endif

      <dt class="col-sm-3">Inquiry Type</dt>
      <dd class="col-sm-9 text-capitalize">{{ str_replace('-', ' ', $message->inquiry_type) }}</dd>
    </dl>

    <h3 class="h6">Message</h3>
    <p style="white-space: pre-wrap;">{{ $message->message }}</p>

    <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-outline-danger btn-sm">Delete Message</button>
    </form>
  </div>

@endsection
