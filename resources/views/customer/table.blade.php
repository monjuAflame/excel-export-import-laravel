<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $item)
      <tr>
        <th scope="row">No.{{ $loop->iteration }}</th>
        <td>{{ $item->first_name }}</td>
        <td>{{ $item->last_name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>