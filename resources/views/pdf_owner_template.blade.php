{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created Date</th>
        <th>Updated Date</th>
    </tr>

<tr>

        <td> {{$owner->id }}</td>
        <td> {{$owner->name }}</td>
        <td> {{$owner->surname}}</td>
        <td> {{$owner->email }}</td>
        <td> {{$owner->phone}}</td>
        <td> {{$owner->created_at }}</td>
        <td> {{$owner->updated_at }}</td>

</tr>
</table>
