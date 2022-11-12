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
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
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
              <tr>
                <td>
                  @if(isset($_POST['search'])){
                    $result = "{{ route('todo.search') }}"
                  }
                  @endif
                </td>
              </tr>
          </tbody>
        </table>
      </div>
      <a class="btn btn-back" href="{{route('todo.index')}}">戻る</a>
    </div>
  </div>  
</body>
</html>