<?php

@session_start();

function get_publish_article()
{
  $datas = array();

  $sql = "SELECT * FROM `article` WHERE `publish` = 1;";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) > 0)
    {
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}
function get_all_article()
{
  $datas = array();

  $sql = "SELECT * FROM `article` ";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) > 0)
    {
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

function get_article($id)
{
  $result = null;

  $sql = "SELECT * FROM `article` WHERE `publish` = 1 AND `id` = {$id}";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) == 1)
    {


        $result = mysqli_fetch_assoc($query);

    }

    //釋放記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
function get_edit_article($id)
{
  $result = null;

  $sql = "SELECT * FROM `article` WHERE `id` = {$id}";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) == 1)
    {


        $result = mysqli_fetch_assoc($query);

    }

    //釋放記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

function get_publish_work()
{
  $datas = array();

  $sql = "SELECT * FROM `works` WHERE `publish` = 1;";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) > 0)
    {
      while ($row = mysqli_fetch_assoc($query))
      {
        $datas[] = $row;
      }
    }

    //釋放記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $datas;
}

function get_work($id)
{
  $result = null;

  $sql = "SELECT * FROM `works` WHERE `publish` = 1 AND `id` = {$id}";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) == 1)
    {


        $result = mysqli_fetch_assoc($query);

    }

    //釋放記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
function check_has_username($username)
{
  $result = null;

  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}'";
  //echo $sql . "\n";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) >= 1)
    {


        $result = true;

    }


  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}
function add_user($username,$password,$name)
{
  $result = null;
	$password = md5($password);
  $sql = "INSERT INTO `user` (`username`, `password`, `name`) VALUE ('{$username}', '{$password}', '{$name}');";

  //echo $sql . "\n";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_affected_rows($_SESSION['link']) == 1)
    {


        $result = true;

    }

  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

function verify_user($username, $password)
{
  $result = null;
  $password = md5($password);

  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";
  //echo $sql . "\n";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) >= 1)
    {

      $user = mysqli_fetch_assoc($query);

      $_SESSION['is_login'] = TRUE;

      $_SESSION['login_user_id'] = $user['id'];

      $result = true;

    }

  }
  else
  {
    echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

function add_article($title,$category,$content,$link,$publish)
{
  $result = null;
  //建立現在的時間
  $create_date = date("Y-m-d H:i:s");

  //取得登入者的id
  $creater_id = $_SESSION['login_user_id'];


  $sql = "INSERT INTO `article` (`title`, `category`, `content`, `publish`, `link`, `create_date`, `creater_id`)
          VALUE ('{$title}','{$category}','{$content}',{$publish},'{$link}','{$create_date}',{$creater_id})";

  $query = mysqli_query($_SESSION['link'], $sql);

        if ($query)
        {
          if (mysqli_affected_rows($_SESSION['link']) == 1)
          {


              $result = true;

          }

        }
        else
        {
          echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
        }

        //回傳結果
        return $result;
}
function update_article($id,$title,$category,$content,$link,$publish)
{
  $result = null;
  //建立現在的時間
  $modify_date = date("Y-m-d H:i:s");

  $sql = "UPDATE `article`
            SET `title` = '{$title}' ,
             `category` = '{$category}',
             `content` = '{$content}',
             `publish` = $publish ,
             `link` = '{$link}',
             `modify_date` = '{$modify_date}'
             WHERE `id` = $id";


  $query = mysqli_query($_SESSION['link'], $sql);

        if ($query)
        {
          if (mysqli_affected_rows($_SESSION['link']) == 1)
          {


              $result = true;

          }

        }
        else
        {
          echo "{$sql} 代表這個語法執行失敗，" . mysqli_error($_SESSION['link']);
        }

        //回傳結果
        return $result;
}



?>
