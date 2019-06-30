<?php
echo 'test';
class Myapp {

  function index($vars)
  {
      return "トップページです。\n";
  }

  function about($vars)
  {
      return "このサイトに関するページです。\n";
  }

  function user($vars)
  {
      return "{$vars['name']} さん、こんにちは。\n";
  }

  function charge($vars)
  {
     if (!isset($_POST['amount'])) {
         return "金額が入力されていません。\n";
     }
     if (500 > $_POST['amount']) {
         return "寄付金は500円以上からお願いします。\n";
     }

     return "寄付していただきありがとうございました。\n";
  }
}