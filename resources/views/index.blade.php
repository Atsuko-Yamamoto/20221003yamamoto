<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
        @if($errors->has('content'))<span>{{ $errors->first('content') }}</span>@endif
        <div class="todo">
        <form action="{{ route('todo.create') }}" method="post" class="flex between mb-30">
          @csrf
          <input type="text" name="content" class="input-add" value="{{ old('content') }}">
          <button type="submit" class="button-add">追加</button>
        </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク</th>
              <th>更新</th>
              <th>削除</th>
              </tr>
            @foreach ($todos as $todo)
            <tr>
              <td>
                  {{$todo->created_at}}
              </td>
              <form action="" method="post"></form>
              @csrf
              <form action="{{ route('todo.update', ['id'=>$todo->id]) }}" method="post">
              <td>
                  <input type="text" class="input-update" value="{{$todo->content}}" name="content">
                </td>
                <td>
                  @csrf
                  <button class="button-update">更新</button>
              </td>
              </form>
              <td>
              <form action="{{ route('todo.destroy', ['id'=>$todo->id]) }}" method="post">
              @csrf
              <button class="button-delete" type="submit">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>