<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            padding: 30px 10px;
        }

        .container {
            width: 100%;
            max-width: 480px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .header h6 {
            margin: 0;
            font-size: 16px;
            color: #1e293b;
            font-weight: 600;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-logout {
            background-color: #f1f5f9;
            color: #64748b;
        }

        .btn-logout:hover {
            background-color: #e2e8f0;
        }

        .btn-primary {
            background-color: #4f46e5;
            color: #fff;
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }

        .btn-danger {
            background-color: #f8fafc;
            color: #dc2626;
            width: auto;
            padding: 6px 12px;
            margin-top: 12px;
            border: 1px solid #e2e8f0;
        }

        .btn-danger:hover {
            background-color: #fee2e2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 8px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #a5b4fc;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        input::placeholder, textarea::placeholder {
            color: #94a3b8;
        }

        .note-card {
            background-color: #f8fafc;
            border-radius: 10px;
            padding: 16px;
            margin-top: 16px;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .note-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .note-title {
            font-weight: 600;
            font-size: 15px;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .note-content {
            font-size: 14px;
            color: #475569;
            line-height: 1.5;
        }

        .empty-message {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #94a3b8;
            padding: 20px;
            background-color: #f8fafc;
            border-radius: 8px;
            border: 1px dashed #e2e8f0;
        }

        .form-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <h6>Welcome back, {{ auth()->user()->name }}</h6>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout">Sign Out</button>
        </form>
    </div>

    <!-- Add Note -->
    <div class="form-group">
        <div class="form-title">Create New Note</div>
        <form method="POST" action="/notes">
            @csrf
            <input type="text" name="title" placeholder="Note title" required>
            <textarea name="content" rows="4" placeholder="Write your note here..." required></textarea>
            <button type="submit" class="btn btn-primary">Save Note</button>
        </form>
    </div>

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
        <div class="empty-message">You don't have any notes yet. Create your first note above!</div>
    @endif

</div>

</body>
</html>