
<h1>ALL OWNERS LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created Date</th>
        <th>Updated Date</th>
    </tr>

    @foreach ($owners as $owner)
        <tr>
            <td> {{$owner->id }}</td>
            <td> {{$owner->name }}</td>
            <td> {{$owner->surname}}</td>
            <td> {{$owner->email }}</td>
            <td> {{$owner->phone}}</td>
            <td> {{$owner->created_at }}</td>
            <td> {{$owner->updated_at }}</td>

        </tr>
    @endforeach
</table>
