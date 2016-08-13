<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PayMeCMS - Customer List</title>
        <link rel="stylesheet" href="/css/foundation.css">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Credit Card</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->credit }}</td>
                    <td><a class="button" onclick="editCustomer({{ $user->id }})">Edit<a></td>
                    <td><a class="alert button" onclick="deleteCustomer(this, {{ $user->id }})">Delete<a></td>
                </tr>
            @endforeach
        </table>

        <script src="/js/vendor/jquery.js"></script>
        <script src="/js/vendor/what-input.js"></script>
        <script src="/js/vendor/foundation.js"></script>
        <script src="/js/app.js"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function deleteCustomer(ele, id){
                $.ajax({
                    type: "DELETE",
                    url: "/customers/"+id,
                    success: function(msg){
                        ele.className = "";
                        ele.textContent = "Deleted";
                        ele.onclick = null;
                    }
                })
            }

            function editCustomer(id){
                window.location = "/customers/edit/"+id;
            }
        </script>
    </body>
</html>
