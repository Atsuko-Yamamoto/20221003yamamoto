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
<body class="font-sans antialiased">
  <div class="container">
    <div class="card">
      <div class="card_header">
        <p class="title mb-15">タスク検索</p>
        <div class="auth mb-15">
        <p class="detail">{{$user->name}}でログイン中</p>
        <form method="post" action="logout">
          @csrf
          <input type="submit" class="btn btn-logout" value="ログアウト">
        </form>
      </div>
      </div>
      <div class="todo">
        <form action="{{route('todo.search')}}" method="get" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="search_content">
          <select name="search_tag" class="select-tag">
            <option disabled selected value></option>
            @foreach ($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->tag}}</option>
            @endforeach
          </select>
          <input class="btn btn-add" type="submit" value="検索" name="search">
        </form>
      <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク</th>
              <th>タグ</th>
              <th>更新</th>
              <th>削除</th>
              </tr>
            @if(isset($_GET['search']))
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
          @endif
          </tbody>
        </table>
      </div>
      <a class="btn btn-back" href="{{route('todo.index')}}">戻る</a>
    </div>
  </div>  
</body>
</html>