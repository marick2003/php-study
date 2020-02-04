<?php

class simpleCMS {
  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    
  }

  public function display_admin() {
    return <<<ADMIN_FORM
    <form action="{$_SERVER['PHP_SELF']}" method="post">
      <label for="title">Title:</label>
      <input name="title" id="title" type="text" maxlength="150" />
      <label for="bodytext">Body Text:</label>
      <textarea name="bodytext" id="bodytext"></textarea>
      <input type="submit" value="Create This Entry!" />
    </form>
    ADMIN_FORM;
  }

  public function write() {
    
  }

  public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
    mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
        CREATE TABLE IF NOT EXISTS testDB (
            title	VARCHAR(150),
            bodytext	TEXT,
            created	VARCHAR(100)
    )
    MySQL_QUERY;
    //mysql_query() 函數在 PHP 中是常用的 MySQL 資料庫語法，用來判斷資料庫查詢是否成功，如果查詢成功則會回傳 true，
    //否則回傳 false，一般在與資料庫連結後才能使用，如果沒有先建立資料庫連結，則會自動透過 mysql_connect() 這個函式去取得一個連結，當然這樣的狀況並不是很好，所以建議先確認你的 PHP 與 MySQL 連結以正確建立
    return mysql_query($sql);
  }
}
class SimpleClass{
    public $var = 'a default value';
    public function displayVar() {
        echo $this->var;
    }

}

?>