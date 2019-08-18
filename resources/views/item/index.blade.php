@extends('item/layout')
@section('content')
<header>
  <div id="nav">
    <ul>
      <li><a href="#" style="color: gray">商品一覧</a></li>
      <li><a href="/item/create">商品登録</a></li>
    </ul>
  </div>
</header>

<body>
  <!-- <h2>商品検索</h2>
  <div>
    <form action="" method="post">
      <label for="seaTitle">タイトル</label>
      <input type="search" name="seaTitle" placeholder="タイトル">
      <label for="maxprice">価格の上限</label>
      <input name="maxprice" type="text" class="price" size="6" maxlength="9" placeholder="円">
      <label for="minprice">価格の下限</label>
      <input name="minprice" type="text" class="price" size="6" maxlength="9" placeholder="円">
      <label for="shop">店舗</label>
      <form>
        <select name="店舗">
          <option value=""></option>

        </select>
      </form>

      <input type="submit" name="submit" value="検索">
    </form>
  </div> -->
  <h2>商品一覧</h2>
  <div class="items">
@foreach($items as $item)
    <div class="itemContainer">

      <div class="item" id="itemBtn">
         <a href="/item/{{ $item->id }}/edit">修正</a>
      <form action="/item/{{ $item->id }}" method="post">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <button type="submit" id="deleteBtn">削除</button>
         </form>
      </div>
      <div class="container">
        <div class="item" id="itemImg">
          <?php
          $image_base64 = base64_encode($item->image);
          ?>
          <img src='data:img/png;base64,{{$image_base64}}' class="itemImag">
        </div>
        <div class="item" id="itemTitle">
          <p>タイトル</p>
          <p>{{ $item->title }}</p>
        </div>
        <div class="item" id="itemMoney">
          <p>価格</p>
          <p>{{ $item->price }}</p>
        </div>
        <div class="item" id="itemDesc">
          <p>説明</p>
          <p>{{ $item->description }}</p>
        </div>

      </div>
    </div>
@endforeach
  </div>

</body>
@endsection
