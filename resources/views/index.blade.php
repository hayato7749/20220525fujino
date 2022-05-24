<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
</head>

<style>
  .main{
    display: flex;
    align-items: center;
    flex-direction: column;
  }
  span{
    color: red;
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
  }
</style>

<body>
  <div class="main">
    <h1>お問い合わせ</h1>
      <div>
      <form action="/check" method="post" class="h-adr">
        @csrf
        <div class="name">
          <label for="label">お名前<span>※</span></label>
          <input type="text"  name="lastname"  value="{{old('lastname')}}">
          @error('lastname') 
            {{"姓は入力必須です"}}
          @enderror
          <input type="text"  name="firstname" value="{{old('firstname')}}">
          @error('firstname') 
            {{"名は入力必須です"}}
          @enderror
        </div>

        <div class="gender">
            <label for="label">性別<span>※</span></label>
            <input type="radio" name="gender" value="male" checked>男性
            <input type="radio" name="gender" value="female">女性
        </div>

        <div class="email">
          <label for="label">メールアドレス<span>※</span></label>
          <input type="email" name="email" value="{{old('email')}}">
          @error('email') 
            </br>{{"メールアドレスは入力必須です"}}
          @enderror
        </div>

        <div class="postcode">
          <span class="p-country-name" style="display:none;">Japan</span>
          <label for="label">郵便番号<span>※</span></label>
          〒<input type="text" class="p-postal-code" size="8" maxlength="8" pattern="^[a-zA-Z0-9]+$" name="postcode" value="{{old('postcode')}}">
          @error('postcode') 
            </br>{{"郵便番号は入力必須です"}}
          @enderror
        </div>
        <div class="address">
          <label for="label">住所<span>※</span></label>
          <input type="text" class="p-region p-locality p-street-address p-extended-address" name="address" value="{{old('address')}}"/>
          @error('postcode') 
            </br>{{"住所は入力必須です"}}
          @enderror
        </div>
        <div class="building_name">
          <label for="label">建物名</label>
          <input type="text" name="building_name" value="{{old('building_name')}}">
        </div>
        <div class="opinion">
          <label for="label">ご意見<span>※</span></label>
          <input type="text" maxlength="120" name="opinion" value="{{old('opinion')}}">
          @error('postcode') 
            </br>{{"ご意見は入力必須です"}}
          @enderror
        </div>
          <button>確認</button>
      </form>
    </div>
  </div>
</body>
</html>