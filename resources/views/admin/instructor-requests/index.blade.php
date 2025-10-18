@extends('admin.layouts.app');

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Card title</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Attachment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendingUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status === 'pending')
                                                <span class="badge bg-yellow text-yellow-fg">Pending</span>
                                            @elseif ($user->status === 'rejected')
                                                <span class="badge bg-red text-red-fg">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->attachment)
                                                <a href="{{ route('admin.instructor-attachment', $user->id) }}"
                                                    class="text-muted">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                        <path d="M7 11l5 5l5 -5" />
                                                        <path d="M12 4l0 12" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.instructor-requests.update', $user->id) }}"
                                                method="POST" id="status-{{ $user->id }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control"
                                                    onchange="document.getElementById('status-{{ $user->id }}').submit();">
                                                    <option selected disabled>Select Action</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="approved">Approve</option>
                                                    <option value="rejected">Reject</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Data Available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
