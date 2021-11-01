<h1>ALL TYPES LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
    </tr>

    @foreach ($types as $type)
        <tr>
            <td> {{$type->id }}</td>
            <td> {{$type->title }}</td>
            <td> {!!$type->description !!}</td>
        </tr>
    @endforeach
</table>
