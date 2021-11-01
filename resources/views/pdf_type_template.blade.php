{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
<table>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>

    </tr>

    <tr>
        <td> {{$type->id }}</td>
        <td> {{$type->title }}</td>
        <td> {!!$type->description !!}</td>
    </tr>

</table>
