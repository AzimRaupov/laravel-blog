
@extends('layouts.appp')

@section('content')

    <div class="container">
        <div class="post">
            <h1>{{ $post->title }} <input type="checkbox" name="{{$post->id}}" id="like" > </h1>
            <p class="post-meta">Опубликовано: {{ $post->created_at->format('d.m.Y') }}</p>
            <div class="post-content">
                {{ $post->text }}
            </div>
        </div>

        <div class="comments">
            <h2>Комментарии</h2>
            @if($post->comments->isNotEmpty())
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <p class="comment-author">{{ $comment->user_id }}</p>
                        <p class="comment-text">{{ $comment->comment }}</p>
                        <p class="comment-date">Дата: {{ $comment->publication_at }}</p>
                    </div>
                @endforeach
            @else
                <p>Пока нет комментариев. Будьте первым!</p>
            @endif
        </div>

        <div class="add-comment">
            <h2>Добавить комментарий</h2>
            <form action="{{ route('comment.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="content">Комментарий:</label>
                    <textarea name="comment" id="content" rows="4" required></textarea>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                </div>
                <button type="submit">Отправить комментарий</button>
            </form>
        </div>

    </div>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .post {
            margin-bottom: 30px;
        }

        .post h1 {
            margin-bottom: 10px;
            color: #333;
        }

        .post-meta {
            color: #888;
            font-size: 0.9em;
            margin-bottom: 20px;
        }

        .post-content {
            line-height: 1.6;
            color: #555;
        }

        .comments h2,
        .add-comment h2 {
            margin-bottom: 15px;
        }

        .comments {
            margin-bottom: 30px;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 5px;
        }

        .comment {
            margin-bottom: 15px;
            padding: 10px;
            background: #fff;
            border-radius: 5px;
        }

        .comment-author {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comment-text {
            margin-bottom: 5px;
        }

        .comment-date {
            font-size: 0.8em;
            color: #888;
        }

        .add-comment {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #4cae4c;
        }

    </style>
    <script>
        const Like=document.getElementById('like');
        console.log(Like)
        Like.addEventListener('change', function() {
            if (this.checked) {

                sendlike(Like.getAttribute('name'))
               console.log('s')
            } else {
                offlike(Like.getAttribute('name'))
                console.log('off');
            }
        });
        function sendlike(id){
            if (id.length > 0) {
                fetch('{{ route('like.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ id: id }),
                })

                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:',data);

                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('An error occurred while sending data.');
                    });
            }
        }
        function offlike(id){
            if (id.length > 0) {
                fetch('{{ route('like.off') }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ id: id }),
                })

                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:',data);

                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('An error occurred while sending data.');
                    });
            }
        }
    </script>
@endsection
