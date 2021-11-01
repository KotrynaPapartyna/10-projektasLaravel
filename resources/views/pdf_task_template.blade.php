    {{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
    <table>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>TYPE</th>
                <th>Owner Name</th>
                <th>Owner Surname</th>
                <th>Created Date</th>
                <th>Updated Date</th>
            </tr>

        <tr>

                <td> {{$task->id }}</td>
                <td> {{$task->title }}</td>
                <td> {!!$task->description !!}</td>
                <td> {{$task->taskType->title }}</td>
                <td> {{$task->taskOwner->name }}</td>
                <td> {{$task->taskOwner->surname }}</td>
                <td> {{$task->created_at }}</td>
                <td> {{$task->updated_at }}</td>

        </tr>
</table>
