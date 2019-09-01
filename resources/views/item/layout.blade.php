<head>
  <title>商品管理</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../../../../css/index.css">

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script>
  /* Ajax通信開始 */
  $(function(){
    $('#get_item').click(function(){
        var request = $.ajax({
            type: 'GET',
            url: '/item/' + search_item + '/item',
            dataType: 'json',
            timeout: 3000,
            data:{'search_item' : $('#search_item').val()}
        });
    /* 成功時 */
        request.done(function(data){
            alert("通信に成功しました");
        });

    /* 失敗時 */
        request.fail(function(){
            alert("通信に失敗しました");
        });

    });
});
  </script>
</head>
@yield('content')
