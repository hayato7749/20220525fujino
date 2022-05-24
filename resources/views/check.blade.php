<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
  .main{
    display: flex;
    justify-content:center;
    align-items: center;
  }
  input{
    border:none;
    font-size:20px;
  }
  label{
    font-size: 20px;
    font-weight: bold;
    margin-right: 30px;
  }
  .name{
    margin-bottom: 20px;
  }
  .gender{
    margin-bottom: 20px;
  }
  .email{
    margin-bottom: 20px;
  }
  .postcode{
    margin-bottom: 20px;
  }
  .address{
    margin-bottom: 20px;
  }
  .building_name{
    margin-bottom: 20px;
  }
  .opinion{
    margin-bottom: 20px;
  }
  button{
    color: white;
    padding: 10px 30px;
    background: black;
    font-size: 15px;
    font-weight: bold;
    border-radius: 5px;
    margin-bottom: 10px;
  }
  .back{
    background: none;
    color: black;
    border: none;
    text-decoration: underline;
  }
</style>

<body>
  <h1>内容確認</h1>
  <form method="POST" action="/thanks">
    @csrf
    <div class="name">
      <input type="hidden" name="lastname" value="{{$inputs['lastname']}}" >
      <input type="hidden" name="firstname" value="{{$inputs['firstname']}}" >
      <label for="label">お名前</label>
      <input type="text" name="fullname" value="{{$inputs['fullname']}}" readonly>
    </div>
    <div class="gender">
      <label for="label">性別</label>
      <input type="text" name="gender" value="{{$inputs['gender']}}" readonly>
    </div>
    <div class="email">
      <label for="label">メールアドレス</label>
      <input type="text" name="email" value="{{$inputs['email']}}" readonly>
    </div>
    <div class="postcode">
      <label for="label">郵便番号</label>
      <input type="text" name="postcode" value="{{$inputs['postcode']}}" readonly>
    </div>
    <div class="address">
      <label for="label">住所</label>
      <input type="text" name="address" value="{{$inputs['address']}}" readonly>
    </div>
    <div class="building_name">
      <label for="label">建物名</label>
      <input type="text" name="building_name" value="{{$inputs['building_name']}}" readonly>
    </div>
    <div class="opinion">
      <label for="label">ご意見</label>
      <input type="text" name="opinion" value="{{$inputs['opinion']}}" readonly>
    </div>
    <button name="regist" type="submit" value="true" >送信</button></br>
    <button name="back" type="submit" value="true" class="back">修正する</button>
  </form>
</body>
</html>
