@extends('layouts.default')
<style>

</style>
@section('content')
<form action="/" method="post">
  @csrf
  <table>
    <tr>
      <th>Todo List</th>
    </tr>
    <tr>
      <td>
        <input type="text" name="content">
      </td>
      <td>
        <input type="submit" value="追加">
      </td>
    </tr>
  </table>
  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td>
        {{$item->created_at}}
      </td>
      <td>
        <input type="text" value="{{$item->content}}">
      </td>
      <td>
        <input type="submit" value="更新">
      </td>
      <td>
        <input type="submit" value="削除">
      </td>
    </tr>
    @endforeach
  </table>
</form>
@endsection