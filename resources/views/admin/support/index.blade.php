@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Support chats</div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User</th><th>Date</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
{{--                                @dd($chats)--}}
                                @foreach($chats as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->conversation->participants()->whereNot('id', 9999)->first()->messageable->name }}</td>
                                        <td>{{ $item->conversation->created_at->toDateTimeString() }}</td>
                                        <td>
                                            <a href="{{ url('/admin/support/' . $item->id . '/edit') }}" title="Edit Deal"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/admin/support' . '/' . $item->conversation_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Deal" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $chats->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
