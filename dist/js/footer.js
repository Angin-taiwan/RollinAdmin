$(function() {
  /* 按下GoTop按鈕時的事件 */
  $('#gotop').click(function(){
      $('html,body').animate({ scrollTop: 0 }, 'fast');   /* 返回到最頂上 */
      return false;
  });
  
  /* 偵測卷軸滑動時，往下滑超過400px就讓GoTop按鈕出現 */
  $(window).scroll(function() {
      if ( $(this).scrollTop() > 400){
          $('#gotop').fadeIn();
      } else {
          $('#gotop').fadeOut();
      }
  });
});