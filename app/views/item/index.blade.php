@extends("layout")
@section("content")
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price(Php)</th>
			<th>Label</th>
            <th>Option</th>
        </tr>
    <thead>
    <tbody
        @foreach ($items as $item)
        <tr> 
            <td> {{ HTML::link('items/' . $item['barcode'], $item['itemName']) }} </td>
            <td> {{ $item['itemcategory']['name'] }} </td>
			<td> {{ $item['price'] }} </td>
			<td> {{ $item['label'] }} </td>
            <td>
                @if(Auth::user()->role == 'admin')
                {{ Form::open(['url' => 'items/' . $item['barcode'], 'style' => 'float: left;']) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('remove', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
                &nbsp;
                <a class="btn btn-small btn-success" href="{{ URL::route('items.edit',$item['barcode']) }} ">edit</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-small btn-primary" href="{{ URL::route('items.create') }}">add item</a>
@stop