<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <style>
    body{
      background-color: #4B0082;
    }
    .article{
      background-color: #ffffff;
      border-radius: 5px;
      padding: 10px;

    }
    
  </style>
</head>
<body>
  <div class="article">
    <form action="/todo/create" method="POST">
      @csrf
      <table>
        <tr>
          <td>
            <input type="text" name="content">
          </td>
          <td>
            <input type="submit" value="追加">
          </td>
        </tr>
      </table>
    </form>
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      @foreach ($items as $form)
      <tr>
          <td>
            {{$form->created_at}}
          </td>
          <form action="todo/update" method="POST">
          @csrf
            <td>
              <input type="text" name="content" value="{{$form->content}}">
              <input type="hidden" name="id" value="{{$form->id}}">
            </td>
            <td>
              <input type="submit" name="update" value="更新">
            </td>
          </form>
          <form action="todo/delete" method="POST">
            @csrf
            <td>
              <input type="submit" name="delete" value="削除">
            </td>
          </form>
        </tr>
        @endforeach
      </table>
  </div>
</body>
</html>
