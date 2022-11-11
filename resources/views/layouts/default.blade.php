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
  <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク</th>
              <th>タグ</th>
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
                  <select name="tag_id" class="select-tag">
                    @foreach ($tags as $tag)
                      <option value="{{$tag->id}}"
                      @if($tag->id==$todo->tag_id) selected @endif>{{$tag->tag}}</option>
                    @endforeach
                  </select>       
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
          @yield('existing')
</body>
</html>