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
      <div class="todo">
        <form action="{{ route('destroy', $todos->id) }}" method="post" class="flex between mb-30">
          @csrf
          <input type="hidden" name="_token" value="">
          <input type="text" name="content" class="input_add">
          <button type="submit" class="button-add">追加</button>
          <button type="submit" class="button-add">削除</button>
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
                  <td>
                  {{$todo->content}}
                </td>
                <td>
                {{$todo->created_at}}
              </td>
              <td>
              {{$todo->updated_at}}
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