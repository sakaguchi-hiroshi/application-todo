<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" href="{{ asset('/assets/css/reset.css')}}">
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">
  
</head>
<body>
  <div class="container">
    <div class="card">
      <p class="card_ttl">Todo List</p>
      <form class="card_add" action="/todo/create" method="POST">
        @csrf
        <input class="card_add_input" type="text" name="content">
        <input class="card_add_btn" type="submit" value="追加">
      </form>
      <table class="card_edit">
        <tr class="card_edit_ttl">
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($items as $form)
        <tr>
          <td class="card_edit_date">
            {{$form->created_at}}
          </td>
          <form class="card_edit_update" action="todo/update" method="POST">
          @csrf
            <td>
              <input class="card_edit_update_input" type="text" name="content" value="{{$form->content}}">
              <input type="hidden" name="id" value="{{$form->id}}">
            </td>
            <td>
              <button class="card_edit_update_btn" type="submit" name="update">更<br>新</button>
            </td>
          </form>
          <form class="card_edit_delete" action="todo/delete" method="POST">
            @csrf
            <td>
              <button class="card_edit_delete_btn" type="submit" name="delete">削<br>除</button>
            </td>
            <td>
              <input type="hidden" name="id" value="{{$form->id}}">
            </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>
</html>
