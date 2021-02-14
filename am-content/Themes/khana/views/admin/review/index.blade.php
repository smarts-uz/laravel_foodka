@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-8">
				<h4>{{ __('Review List') }}</h4>
			</div>
			<div class="col-lg-4">
				<div class="single-filter">
					<div class="form-group">

						<input type="text" id="data_search" class="form-control" placeholder="Enter Value">

					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive custom-table">
			<table class="table">
				<thead>
					<tr>
						<th class="am-title">{{ __('Review Id') }}</th>
						<th>{{ __('Restaurant Name') }}</th>
						<th>{{ __('Reviewer Name') }}</th>
						<th class="am-tags">{{ __('Rattings') }}</th>
						<th class="am-tags">{{ __('Review') }}</th>
						<th class="am-tags">{{ __('Action') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($reviews as $review)
					<tr>
						<th>
							{{ $review->id }}
						</th>
						<th>{{ App\User::find($review->vendor_id)->name }}</th>
						<td>{{ App\User::find($review->user_id)->name }}</td>
						<td>{{ $review->comment_meta->star_rate }} {{ __('Star') }}</td>
						<td>{{ $review->comment_meta->comment }}</td>
						<td>
							<a target="__blank" href="{{ url('store/'.App\User::find($review->vendor_id)->slug) }}" class="btn btn-info">{{ __('View') }}</a>
							<a href="{{ route('admin.review.delete',$review->id) }}" class="btn btn-danger">{{ __('Delete') }}</a>
						</td>
					</tr>
					@endforeach

				</tbody>

				<tfoot>
					<tr>
						<th class="am-title">{{ __('Title') }}</th>
						
						<th class="am-tags">{{ __('Price') }}</th>
						<th class="am-tags">{{ __('Sales') }}</th>

						<th class="am-tags">{{ __('Status') }}</th>

						<th class="am-date">{{ __('Last Modified') }}</th>
					</tr>
				</tfoot>
			</table>
			{{ $reviews->links() }}
		</div>
	</div>
</div>

@endsection