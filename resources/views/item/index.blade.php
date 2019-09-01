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
  <h2>商品検索</h2>
<div>
<div class="form-group">
    <label for="search_item">タイトル</label>
    <input type="text" id="search_item" name="search_item">
</div>
<button type="button" id="get_item">商品を検索</button>

  </div>
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
