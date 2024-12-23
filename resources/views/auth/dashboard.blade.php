<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f5ff;
            margin: 0;
            padding: 0;
            color: #4a148c;
        }
        header {
            background-color: #7e57c2;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        .logout {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4a148c;
            font-size: 20px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #7e57c2;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f8f5ff;
        }
        tr:hover {
            background-color: #e1d5f5;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </header>

    <div class="container">
        <h2>Internships</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($internships as $internship)
                    <tr>
                        <td>{{ $internship->id }}</td>
                        <td>{{ $internship->title }}</td>
                        <td>{{ $internship->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
