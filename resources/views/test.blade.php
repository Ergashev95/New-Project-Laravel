<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>

    <h1>test page</h1>

    {{-- <p>{{ $name }} <span>{{ $prof }}</span></p> --}}



        <table border="1">
            <tr>
                <td>name</td>
                <td>status</td>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <th>{{ $category->name }}</th>
                <th>{{ $category->status }}</th>
            </tr>
            @endforeach
        </table>




</body>
</html>
