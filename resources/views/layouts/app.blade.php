<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Dashboard</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f3e5f5; /* Light Purple */
            color: #333;
        }

        a {
            text-decoration: none;
            color: #6a1b9a;
            transition: 0.3s;
        }

        a:hover {
            color: #4a148c;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #6a1b9a; /* Purple */
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            margin: 0 0 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #4a148c; /* Dark Purple */
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            background: white;
            border-radius: 8px;
            padding: 30px 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            /* max-width: 600px; */
            text-align: center;
        }

        h1 {
            color: #6a1b9a;
            font-size: 24px;
            margin-bottom: 20px;
        }

        button, .btn {
            background-color: #6a1b9a;
            color: white;
            padding: 10px 20px;
            font-size: 14px;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover, .btn:hover {
            background-color: #4a148c;
        }

        input[type="text"], textarea, input[type="file"], select {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6a1b9a;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="{{ route('achievements.index') }}">Student Achievements</a></li>
            <li><a href="{{ route('internships.index') }}">Student Internships</a></li>
            <li><a href="{{ route('paper_publications.index') }}">Paper Publications</a></li>
            <li><a href="{{ route('courses_workshops.index') }}">Courses/Workshops</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="post">@csrf
                <button class="btn btn-primary" type="submit">Logout
                </button>
        </form>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
