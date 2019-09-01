<header>
  <div id="nav">
    <ul>
      <li><a href="/item">商品一覧</a></li>
      <li><a href="#" style="color: gray">商品登録</a></li>
    </ul>
  </div>
</header>
<div>
    <div>
        <div>
           @if($target == 'store')
            <h2>商品情報を追加する</h2>
            @elseif($target == 'update')
            <h2>商品情報を修正する</h2>
            @endif
        </div>
    </div>
    <div>
        <div>
          @include('item/message')
          @if($target == 'store')
            <form action="/item" method="post">
            @elseif($target == 'update')
            <form action="/item/{{ $item->id }}" method="post">
                <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
                <input type="hidden" name="_method" value="PUT">
            @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="title">タイトル(100字以下)</label>
                    <input type="text" class="form-control" name="title" value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="price">価格(円)</label>
                    <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                </div>
                <div class="form-group">
                    <label for="description">説明（500字以下）</label>
                    <input type="text" class="form-control" name="description" value="{{ $item->description }}">
                </div>
                <div class="form-group">
                    <label for="item_filename">IMAGE</label>
                    @if($target == 'update')
                    <img src="data:image/png;base64,{{ $item->image}}">
                    @endif
                
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="shop_list">店舗</label>
                    <input type="text" class="form-control" name="shop_list" value="{{ $item->shop_list }}">
                </div>

                @if($target == 'store')
                 <button type="submit" class="btn btn-default">新規登録</button>
                 @elseif($target == 'update')
                <button type="submit" class="btn btn-default">登録する</button>
                 @endif

                <a href="/item">戻る</a>
            </form>
        </div>
    </div>
</div>
