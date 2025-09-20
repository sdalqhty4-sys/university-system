<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <head>
    <title>Ali Al-Obal</title>
    <style>
      div {
        width: 30%;
        height: 20%;
        border-radius: 20px 20px 20px 20px;
        box-shadow: 0px 0px 15px;
        background: rgb(2, 0, 36);
        text-align: center;
        padding: 30px;
        margin-bottom: 15px;
      }

      body {
        background: linear-gradient(to right, #8e2de2, #4a00e0);
      }

      .btnAddPage {
        border: 3px solid white;
        border-radius: 20px;
        box-shadow: 0px 0px 15px;
        background: rgb(2, 0, 36);
        text-align: center;
        font-size: large;
        font-weight: bold;
        color: white;
        padding: 20px;
        margin-left: 120px;
      }

      select {
        font-size: 20px;
        padding: 5px;
        height: 40px;
        width: 400px;
        background-color: white;
        color: rgb(8, 9, 15);
        border-radius: 50px;
      }

      .table {
        color: #4a00e0;
        border-radius: 15px;
        border-color: rgb(2, 0, 36);
      }

      .Dst {
        background-color: white;
        margin-left: 50%;
        color: rgb(2, 0, 36);
        padding: 7px;
        margin-top: -300px;
        width: 40%;
      }
    </style>
  </head>

<body>
  <div>
    <form>
      <select name="Col" id="Col" onchange="dep(this.value);">
        <option value="">--SELE THE COL--</option>
      </select> <br><br>
      <select name="Dep" id="Dep" onchange="st(this.value);">
        <option>-------</option>
      </select><br><br>
      <select name="St" id="St">
        <option onchange="print_stu_info('','','')">-------</option>
      </select>
    </form>
  </div>
  <input type="submit" value="Manage Students" class="btnAddPage" onclick="goto_add_page('insert.php')">

  <form>

    <div class="Dst">
      <h2>بيانات الطالب</h2>
      <table border='5' mothed='POST' class="table">
        <thead>
          <tr>
            <td>
              <h3>رقم الطالب</h3>
            </td>
            <td>
              <h3>اسم الطالب</h3>
            </td>
            <td>
              <h3>اسم الكلية</h3>
            </td>
            <td>
              <h3>اسم القسم</h3>
            </td>
          </tr>
        </thead>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "student");
        mysqli_query($conn, "SET NAMES utf8");
        mysqli_query($conn, "SET CHARACTER SET utf8");

        // $selectde = "SELECT * FROM st";
        $selectde = "SELECT st.St_No, Col.Col_Name, depart.Dep_Name, st.St_Name FROM st, depart, col where st.Col_No = Col.Col_No and depart.Dep_No = st.Dep_No";
        $sede = mysqli_query($conn, $selectde);
        while ($row = mysqli_fetch_array($sede)) {
        ?>
          <tbody>
            <tr>
              <th><?php echo "<h4><font color=red>" . $row['St_No'] . "</font></h4>"; ?></th>
              <th><?php echo "<h4><font color=black>" . $row['St_Name'] . "</font></h4>"; ?></th>
              <th><?php echo "<h4><font color=black>" . $row['Col_Name'] . "</font></h4>"; ?></th>
              <th><?php echo "<h4><font color=black>" . $row['Dep_Name'] . "</font></h4>"; ?></th>
               <td>
                <a href="edit.php?id=<?php echo $row['St_No'] ?>">تعديل</a>
              </td>
              <td>
                <a href="delete_student.php?id=<?php echo $row['St_No'] ?>">حذف</a>
              </td> 
            </tr>
          </tbody>
        <?php
        }
        ?>
      </table>
    </div>
  </form>

</body>

</html>

<?php
$db_user = "root";
$db_pass = "";
$db_databas = "Student";
$db = mysqli_connect("localhost", "$db_user", "$db_pass", "$db_databas");
mysqli_query($db, "SET NAMES utf8");
mysqli_query($db, "SET CHARACTER SET utf8");

#######One
$ar_c_id = array();
$ar_c_in = array();
$ar_d_id = array();
$ar_d_ic = array();
$ar_d_in = array();
$ar_s_id = array();
$ar_s_ic = array();
$ar_s_in = array();

$sql_col = mysqli_query($db, "SELECT * FROM Col");

while ($key_col = mysqli_fetch_assoc($sql_col)) {

  echo "<script>
    var col=document.getElementById('Col');
    col.innerHTML+='<option value=" . $key_col['Col_No'] . ">" . $key_col['Col_Name'] . "</option>';
    </script>";
}
$qry = mysqli_query($db, "SELECT * FROM Depart ");
$cd = 0;
while ($k_d = mysqli_fetch_assoc($qry)) {
  $ar_d_id[$cd] = $k_d['Dep_No'];
  $ar_d_ic[$cd] = $k_d['Col_No'];
  $ar_d_in[$cd] = $k_d['Dep_Name'];
  $cd++;
}
$qry2 = mysqli_query($db, "SELECT * FROM St");
$cd2 = 0;
while ($k_d2 = mysqli_fetch_assoc($qry2)) {
  $ar_s_id[$cd2] = $k_d2['St_No'];
  $ar_s_ic[$cd2] = $k_d2['Dep_No'];
  $ar_s_in[$cd2] = $k_d2['St_Name'];
  $cd2++;
}

?>
<script>
  function dep(id) {
    var dn = <?php echo '["' . implode('", "', $ar_d_in) . '"]' ?>;
    var dc = <?php echo '["' . implode('", "', $ar_d_ic) . '"]' ?>;
    var di = <?php echo '["' . implode('", "', $ar_d_id) . '"]' ?>;
    var dd = document.getElementById("Dep");
    dd.focus();
    if (dc.includes(id)) {
      dd.innerHTML = "<option > Select DEPART</option>";
      for (var i = 0; i < dc.length; i++) {
        if (dc[i] == id) {
          dd.innerHTML += "<option value='" + di[i] + "'>" + dn[i] + "</option>";
        }
      }
    } else {
      dd.innerHTML = "<option > !NOT FOUND</option>";
    }
  }
  //////////towwwwwww
  var stt = document.getElementById('St');
  var college = document.getElementById('Col').value;
  var dept = document.getElementById('Dep').value;

  function st(dd) {
    stt.innerHTML = "<option > Select STUDENT</option>";
    var sn = <?php echo '["' . implode('", "', $ar_s_in) . '"]' ?>;
    var sc = <?php echo '["' . implode('", "', $ar_s_ic) . '"]' ?>;
    var si = <?php echo '["' . implode('", "', $ar_s_id) . '"]' ?>;
    stt.focus();
    if (sc.includes(dd)) {
      for (var g = 0; g < sc.length; g++) {
        if (sc[g] == dd) {
          stt.innerHTML += "<option value='" + si[g] + "'>" + sn[g] + "</option>";
          // stt.innerHTML += "<option onchange='print_stu_info(" + sn[g] + "," + college + "," + dept + ")' value='" + si[g] + "'>" + sn[g] + "</option>";
        }
      }
    } else {
      stt.innerHTML = "<option >!NOT FOUND</option>";
    }
  }

  function goto_add_page(page) {
    window.location.href = page;
    // window.open(page);
  }

  // function print_stu_info(stname, stcol, stdept) {
  //   alert(stcol + " " + stdept + " " + stname);
  // }
</script>