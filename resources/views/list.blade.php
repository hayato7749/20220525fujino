<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  h1{
    text-align: center;
  }
  .search{
    border: solid 2px black;
    padding: 30px;
    margin-bottom: 30px;
  }
  label{
    font-size: 20px;
    font-weight: bold;
    margin-right: 30px;
  }
  input{
    height:20px;
    border-radius: 5px;
  }
  .gender{
    margin-left: 30px; 
  }
  .date{
    margin-top: 20px;
  }
  .email{
    margin-bottom: 5px;
  }
  .search-button{
    color: white;
    padding: 10px 30px;
    background: black;
    font-size: 15px;
    font-weight: bold;
    border-radius: 5px;
    height:40px;
    margin-bottom: 10px;
  }
  a{
    color: black;
  }
  th{
    padding-right:30px;
  }
  table, th {
    border-bottom: 1px solid black;
  }
  table {
    width:100%;
    border-collapse: collapse;
    border-bottom: none;
  }
  td{
    padding-top:5px;
  }
  button{
    color: white;
    padding: 10px 20px;
    background: black;
    font-size: 15px;
    font-weight: bold;
    border-radius: 5px;
    margin-bottom: 10px;
  }
    ul.pagination {
    padding:0;
    font-size:0px;
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }
  ul.pagination li {
    width:35px;
    border:1px solid grey;
    display: inline-block;
    text-align: center;
    font-size:16px;
  }
</style>
<body>
  <h1>管理システム</h1>
  <div class="search">
    <form action="/search" method="GET">
      @csrf
      <label>お名前</label>
        <input type="text" name="name" >
      <label class="gender">性別</label>
        <input type="radio" name="gender" value="all" style="transform:scale(1.5)" checked>全て
        <input type="radio" name="gender" value="male" style="transform:scale(1.5)">男性
        <input type="radio" name="gender" value="female" style="transform:scale(1.5)">女性
      </br>
      <div class="date">
      <label>登録日</label>
        <input type="date" name="from" >
          <span>~</span>
        <input type="date" name="until">
      </div>
      </br>
      <div class="email">
        <label>メールアドレス</label>
        <input type="email" name="email" >
      </div>
      </br>
      <input type="submit" value="検索" class="search-button">
      </br>
      <a href="/list">リセット</a>
    </form>
  </div>
  <table>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th>　</th>
    </tr>  
    {{$items->links()}}
  @foreach ($items as $item)
    <tr>
      <td>
        {{$item->id}}
      </td>
      <td>
        {{$item->fullname}}
      </td>
      <td>
        {{$item->gender}}
      </td>
      <td>
        {{$item->email}}
      </td>
      <td>
      {{Str::limit($item->opinion, 25, '(…)' )}}
      </td>
      <td>
        <form action="/delete/{{$item->id}}" method="POST"> 
          @csrf
          <button>削除</button>
        </form>
      </td>
    </tr> 
  @endforeach
  </table>

</body>
</html>