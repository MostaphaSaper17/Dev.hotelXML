@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-articles"></span> Support Tickets
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="Search ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Agent Name</th>
						<th>Company Email</th>
						<th>Subject</th>
						<th>Status</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tickets as $ticket)
					 <tr>
						<td>{{$ticket->ticket_code}}</td>
						<td>{{$ticket->agent_id}}</td>
						<td>{{$ticket->company_email}}</td>
						<td>{{$ticket->subject}}</td>
						<td>{{$ticket->status}}</td>
						<td style="width: 360px;">

							@can('support-ticket-read')
							<a href="{{route('admin.support-tickets.show',$ticket)}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> Show
								</span>
							</a>
							@endcan

							@can('support-ticket-delete')
							<form method="POST" action="{{route('admin.support-tickets.destroy',$ticket)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('Do You Want to Delete This Ticket ?');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> Delete
								</button>
							</form>
							@endcan
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		{{-- <div class="col-12 p-3">
			{{$articles->appends(request()->query())->render()}}
		</div> --}}
	</div>
</div>
@endsection