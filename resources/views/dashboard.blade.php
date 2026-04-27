<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            padding: 30px 10px;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h6 {
            margin: 0;
            font-size: 14px;
        }

        .btn {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-logout {
            background-color: #6b7280;
            color: #fff;
        }

        .btn-logout:hover {
            background-color: #4b5563;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #fff;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        .btn-primary:hover {
            background-color: #1e40af;
        }

        .btn-danger {
            background-color: #dc2626;
            color: #fff;
            width: 100%;
            margin-top: 8px;
        }

        .btn-danger:hover {
            background-color: #b91c1c;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .note-card {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 12px;
            margin-top: 10px;
        }

        .note-title {
            font-weight: bold;
            font-size: 14px;
        }

        .note-content {
            font-size: 13px;
            margin-top: 5px;
            color: #555;
        }

        .empty-message {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <h6>Hello, {{ auth()->user()->name }}</h6>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>

    <!-- Add Note -->
    <form method="POST" action="/notes">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" rows="3" placeholder="Content" required></textarea>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>

    <!-- Notes -->
    @if(isset($notes) && count($notes) > 0)
        @foreach($notes as $note)
            <div class="note-card">
                <div class="note-title">{{ $note->title }}</div>
                <div class="note-content">{{ $note->content }}</div>

                <form method="POST" action="/notes/{{ $note->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    @else
        <div class="empty-message">No notes yet. Add one above!</div>
    @endif

</div>

</body>
</html>